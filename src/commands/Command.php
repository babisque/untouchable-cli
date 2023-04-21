<?php

namespace Untouchable\Commands;

interface Command
{
    public function run();
    public function setSubcommandsOrArguments($subcommandsOrArguments);
}