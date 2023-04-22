<?php

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use Dotenv\Dotenv;
use Untouchable\Commands\CreateSchema;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

final class CreateSchemaTest extends TestCase
{
    public function testUserCanCreateASchema()
    {
        $pdo = new PDO('mysql:host=localhost', $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $command = new CreateSchema($pdo);
        $command->setSubcommandsOrArguments(['name' => 'test_db']);
        $result = $command->run();
        $this->assertEquals(1, $result);
    }

    public function testUserCannotCreateASchemaWithSameName()
    {
        $pdo = new PDO('mysql:host=localhost', $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $command = new CreateSchema($pdo);
        $command->setSubcommandsOrArguments(['name' => 'test_db']);
        $result = $command->run();

        $this->assertEquals(1, $result);
    }
}