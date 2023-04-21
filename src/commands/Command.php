<?php

namespace Untouchable\Commands;

use PDO;

interface Command
{
    /**
     * @param PDO $pdo
     */
    public function __construct($pdo);
    public function run();
    public function setSubcommandsOrArguments($subcommandsOrArguments);
}