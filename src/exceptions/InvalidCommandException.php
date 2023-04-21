<?php

namespace Untouchable\Exceptions;

use Exception;
use Throwable;

class InvalidCommandException extends Exception
{
    public function __construct(string $message = "Invalid command.", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}