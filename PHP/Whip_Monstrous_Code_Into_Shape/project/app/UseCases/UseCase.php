<?php


namespace App\UseCases;

/**
 * UseCase, Non-Queued Job, or Self-Handling command
 * are basically the exact same thing.
 */
abstract class UseCase
{
    public static function perform()
    {
        return (new static)->handle();
    }

    abstract public function handle();
}
