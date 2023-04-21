<?php

namespace Untouchable\Commands;

class Hello implements Command
{
    private array $arguments = [];
    
    public function run()
    {
        echo "hello";
    }

    public function setSubcommandsOrArguments(array $arguments)
    {
        $this->arguments = $arguments;
    }
}