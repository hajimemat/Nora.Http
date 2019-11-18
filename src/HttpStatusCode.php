<?php
/**
 * Nora
 */
namespace Nora\Http;

/**
 * HTTPステータスコード
 */
class HttpStatusCode
{
    const SUCESSFUL_OK = 200;
    const SUCESSFUL_CREATED = 201;
    const SUCESSFUL_ACCEPTED = 202;
    const REDIRECTION_MOVED_PERMANENTLY = 301;
    const REDIRECTION_FOUND = 302;
    const REDIRECTION_NOT_MODIFIED = 304;
    const CLIENT_ERROR_BAD_REQUEST = 400;
    const CLIENT_ERROR_UNAUTHORIZED = 401;
    const CLIENT_ERROR_FORBIDDEN = 403;
    const CLIENT_ERROR_NOT_FOUND = 404;
    const SERVER_ERROR_INTERNAL = 500;
    const SERVER_ERROR_BAD_GATEWAY = 502;
    const SERVER_ERROR_GATEWAY_TIMEOUT = 504;
    const SUCCESS = 200;
    const INVALID = 400;
    const MOVED = 302;
    const ERROR = 500;

    /**
     * @var array HTTP status codes
     */
    public static $codes = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required'
    );

    /**
     * ステータスコードが存在するかを返す
     *
     * @param int $code
     * @return bool
     */
    public static function isExists(int $code): bool
    {
        return array_key_exists($code, static::$codes);
    }
}
