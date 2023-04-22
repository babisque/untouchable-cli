<?php

namespace Untouchable\Commands;

use PDO;

class CreateSchema implements Command
{
    private array $arguments = [];
    private PDO $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function run()
    {
        $dbName = $this->arguments["name"];
        $sql = "CREATE DATABASE IF NOT EXISTS {$dbName}";
        
        return $this->pdo->exec($sql);
    }

    public function setSubcommandsOrArguments($subcommandsOrArguments)
    {
        $this->arguments = $subcommandsOrArguments;
    }
}