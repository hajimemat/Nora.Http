<?php
declare(strict_types=1);

namespace Nora\Http\Provide;

use Psr\Http\Message\{
    UploadedFileInterface
};

class UploadedFileFactory
{
    public function __invoke(
        array $file
    ) : UploadedFileInterface {

        $request = (new ServerRequest($newServerParams))
            ->withCookieParams($globals['_COOKIE'])
            ->withQueryParams($globals['_GET'])
            ->withParsedBody($globals['_POST']);

    }
}

