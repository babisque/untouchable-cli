<?php

use Untouchable\Exceptions\InsufficientArgumentException;
use Untouchable\Exceptions\InvalidCommandException;

require_once __DIR__ . '/vendor/autoload.php';

$commands = require_once __DIR__ . '/config/commands.php';

if (count($argv) < 2) {
    throw new InsufficientArgumentException("Insufficient number of arguments");
}

$command = $argv[1];
if (array_key_exists($command, $commands)) {
    $commandClass = $commands["$command"];
    $app = new $commandClass;

    if (count($argv) > 2) {
        $subcommandsOrArguments = array_slice($argv, 2);
        $app->setSubcommandsOrArguments($subcommandsOrArguments);
    }
} else {
    throw new InvalidCommandException("Invalid '$command' command.");
}

$app->run();