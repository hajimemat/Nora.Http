<?php
namespace Nora\Http;

/**
 * メッセージテスト
 */
use PHPUnit\Framework\TestCase;


class UriTest extends TestCase
{
    public function testMessage()
    {
        $uri = new Message\Uri();

        $scheme = $uri->withScheme('http');
        $host = $scheme->withHost('avap.co.jp');
        $port = $host->withPort('8080');
        $path = $port->withPath('/home');
        $fragment = $path->withFragment('index');
        $user = $fragment->withUserInfo('kurari');
        $pass = $fragment->withUserInfo('kurari', 'password');
        $https = $pass->withScheme('https');

        $this->assertEquals('http://', (string) $scheme);
        $this->assertEquals('http://avap.co.jp', (string) $host);
        $this->assertEquals('http://avap.co.jp:8080', (string) $port);
        $this->assertEquals('http://avap.co.jp:8080/home', (string) $path);
        $this->assertEquals('http://avap.co.jp:8080/home#index', (string) $fragment);
        $this->assertEquals('http://kurari@avap.co.jp:8080/home#index', (string) $user);
        $this->assertEquals('http://kurari:password@avap.co.jp:8080/home#index', (string) $pass);
        $this->assertEquals('https://kurari:password@avap.co.jp:8080/home#index', (string) $https);
    }
}
