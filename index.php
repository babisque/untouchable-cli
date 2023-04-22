<?php

use Untouchable\Exceptions\InsufficientArgumentException;
use Untouchable\Exceptions\InvalidCommandException;
use Untouchable\Services\ArgumentsHandler;
use Untouchable\Services\ConnectionCreator;
use Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$commands = require_once __DIR__ . '/utils/commands.php';
$pdo = ConnectionCreator::getInstance();

if (count($argv) < 2) {
    throw new InsufficientArgumentException("Insufficient number of arguments");
}

$command = strtolower($argv[1]);
if (array_key_exists($command, $commands)) {
    $commandClass = $commands["$command"];
    $app = new $commandClass($pdo);

    if (count($argv) > 2) {
        $subcommandsOrArguments = array_slice($argv, 2);
        $args = ArgumentsHandler::getArguments($subcommandsOrArguments);
        $app->setSubcommandsOrArguments($args);
    }
} else {
    throw new InvalidCommandException("Invalid '$command' command.");
}

$app->run();