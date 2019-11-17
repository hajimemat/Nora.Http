<?php
namespace Nora\Http;

/**
 * メッセージテスト
 */
use PHPUnit\Framework\TestCase;


class MessageTest extends TestCase
{
    public function testMessage()
    {
        $message = new Message\Message();
        $newMessage = $message->withHeader('content-type', 'text/html');

        $this->assertTrue($newMessage->hasHeader('Content-type'));
        $this->assertFalse($message->hasHeader('Content-type'));

        $fp = fopen('php://memory', 'r+');
        fwrite($fp, 'hogehoge');

        $body = new Message\Stream($fp);
        $newMessage = $newMessage->withBody($body);

        var_dump($newMessage);
        var_dump($newMessage->getBody()->getContents());

    }
}
