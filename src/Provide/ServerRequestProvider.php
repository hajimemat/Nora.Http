<?php
declare(strict_types=1);

namespace Nora\Http\Provide;


use Nora\DI\ProviderInterface;

use Nora\App;
use Nora\Cache\CacheFactory;
use Nora\System\EnvFactory;

use Nora\Http\Message\Uri;
use Nora\Http\Message\ServerRequest;
use Nora\Http\Provide\ServerRequestFactory;

class ServerRequestProvider implements ProviderInterface
{
    private $factory;

    public function __construct(ServerRequestFactory $factory)
    {
        $this->factory = $factory;
    }

    public function get( )
    {
        return ($this->factory)($GLOBALS, $_SERVER);
    }
}
