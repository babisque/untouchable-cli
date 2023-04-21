<?php

namespace Untouchable\Commands;

class CreateSchema implements Command
{
    private array $arguments = [];

    public function run()
    {
        var_dump($this->arguments);
    }

    public function setSubcommandsOrArguments($subcommandsOrArguments)
    {
        $this->arguments = $subcommandsOrArguments;
    }
}