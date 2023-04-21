<?php

declare(strict_types=1);

use Untouchable\Commands\{
    Hello,
    CreateSchema
};

return [
    'Hello' => Hello::class,
    'create-schema' => CreateSchema::class
];