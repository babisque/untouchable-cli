<?php

use PHPUnit\Framework\TestCase;
use Untouchable\Commands\Hello;
use Untouchable\Exceptions\InsufficientArgumentException;
use Untouchable\Exceptions\InvalidCommandException;

require_once __DIR__ . '/../vendor/autoload.php';

final class ExceptionTest extends TestCase
{
    public function testUserCannotCallNonexistentCommand()
    {
        $pdoMock = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->getMock();

        $command = 'nonexistentcommand';
        $argv = ['index.php', $command];

        $this->expectException(InvalidCommandException::class);

        $commandClass = $this->getMockBuilder(Hello::class)
            ->setConstructorArgs([$pdoMock])
            ->getMock();

        $commandClass->expects($this->once())
            ->method('run')
            ->willThrowException(new InvalidCommandException());

        $commandClass->setSubcommandsOrArguments([]);
        $commandClass->run();
    }

    public function testUserCannotPassAnEmptyCommand()
    {
        $pdoMock = $this->getMockBuilder(PDO::class)
            ->disableOriginalConstructor()
            ->getMock();

        $command = '';
        $argv = ['index.php', $command];

        $this->expectException(InsufficientArgumentException::class);

        $commandClass = $this->getMockBuilder(Hello::class)
            ->setConstructorArgs([$pdoMock])
            ->getMock();

        $commandClass->expects($this->once())
            ->method('run')
            ->willThrowException(new InsufficientArgumentException());

        $commandClass->setSubcommandsOrArguments([]);
        $commandClass->run();
    }
}