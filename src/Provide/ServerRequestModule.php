<?php
declare(strict_types=1);

namespace Nora\Http\Provide;

use Nora\DI\Module;
use Psr\Http\Message\ServerRequestInterface;

class ServerRequestModule extends Module
{
    public function configure()
    {
        $this
            ->bind(ServerRequestFactory::class)
            ->to(ServerRequestFactory::class);

        $this
            ->bind(ServerRequestInterface::class)
            ->toProvider(ServerRequestProvider::class);
    }
}
