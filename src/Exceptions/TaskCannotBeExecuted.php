<?php

namespace Enigma\Multitenancy\Exceptions;

use Exception;
use Enigma\Multitenancy\Tasks\SwitchTenantTask;

class TaskCannotBeExecuted extends Exception
{
    public static function make(SwitchTenantTask $task, string $reason): self
    {
        $taskClass = $task::class;

        return new static("Task `{$taskClass}` could not be executed. Reason: {$reason}");
    }
}
