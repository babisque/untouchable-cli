<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Untouchable\Commands\Hello;

final class HelloTest extends TestCase
{
    public function testCommandHelloIsReturningHelloMessage()
    {
        $pdoMock = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->getMock();

        $command = 'Hello';
        $argv = ['index.php', $command];

        $hello = new Hello($pdoMock);
        $hello->setSubcommandsOrArguments([]);
        ob_start();
        $hello->run();
        $output = ob_get_clean();

        $this->assertEquals('hello', $output);
    }
}