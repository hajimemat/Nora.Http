<?php
declare(strict_types=1);

namespace Nora\Http\Provide;

use Nora\Http\Message\{
    Uri,
    ServerRequest
};
use Psr\Http\Message\{
    ServerRequestInterface
};

class ServerRequestFactory
{
    // HTTPヘッダ差分対応
    private static $map = [
        'REMOTE_ADDR' => [
            'HTTP_X_FORWARDED_FOR'
        ],
        'HTTP_HOST' => [
            'HTTP_X_FORWARDED_HOST',
        ],
        'HTTPS' => [
            'HTTP_X_FORWARDED_PROTO'
        ]
    ];

    public function __invoke(
        array $globals,
        array $serverParams = []
    ) : ServerRequestInterface {
        $newServerParams = [];

        // 大文字に統一
        foreach ($serverParams as $k=>$v) {
            $newServerParams[strtoupper($k)] = $v;
        }

        // 差分対応
        foreach (self::$map as $k => $v) {
            foreach ($v as $vv) {
                if (isset($newServerParams[$vv])) {
                    $newServerParams[$k] = $newServerParams[$vv];
                    continue 2;
                }
            }
        }

        // アップロードファイル用
        $files = [];
        foreach ($globals['_FILES'] as $file) {
            $files[] = (new UploadedFileFactory)(
                $file['name'],
                $file['type'],
                $file['tmp_name'],
                $file['error'],
                $file['size']
            );
        }

        // URIを作成する
        $host  = strtok($newServerParams['HTTP_HOST'] ?? "", ':');
        $port  = strtok('');
        $path  = strtok($newServerParams['REQUEST_URI'] ?? "", '?');
        $query = strtok('');
        $uri   = (new Uri)
            ->withHost($host)
            ->withPort($port)
            ->withPath($path)
            ->withScheme($newServerParams['HTTPS'] ?? 'http')
            ->withQuery($query);

        // リクエスト作成
        return (new ServerRequest($newServerParams))
            ->withUri($uri)
            ->withMethod($newServerParams['REQUEST_METHOD'])
            ->withCookieParams($globals['_COOKIE'] ?? [])
            ->withQueryParams($globals['_GET'] ?? [])
            ->withParsedBody($globals['_POST'] ?? [])
            ->withUploadedFiles($files)
        ;
    }
}

