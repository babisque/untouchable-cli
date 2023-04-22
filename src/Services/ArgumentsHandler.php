<?php

namespace Untouchable\Services;

class ArgumentsHandler
{
    private static array $args = [];

    public static function getArguments(array $arguments): array
    {
        foreach ($arguments as $argument) {
            $argument = str_replace('--', '', $argument);
            $argument = str_replace('-', '', $argument);
            $parts = explode('=', $argument, 2);
            $key = $parts[0];
            $value = $parts[1] ?? null;
            if (strlen($value) > 0) {
                self::$args[$key] = $value;
            } else {
                self::$args[$key] = $value;
            }
        }
        return self::$args;
    }
}