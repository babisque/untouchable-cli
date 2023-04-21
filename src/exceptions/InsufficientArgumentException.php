<?php

namespace Untouchable\Exceptions;

use Exception;
use Throwable;

class InsufficientArgumentException extends Exception
{
    public function __construct(string $message = "Insufficient number of arguments", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}