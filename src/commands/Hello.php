<?php

namespace Untouchable\Commands;

use PDO;

class Hello implements Command
{
    private array $arguments = [];

    /**
     * @param PDO $pdo
     */
    public function __construct($pdo)
    {}
    
    public function run()
    {
        echo "hello";
    }

    public function setSubcommandsOrArguments($subcommandsOrArguments)
    {
        $this->arguments = $subcommandsOrArguments;
    }
}