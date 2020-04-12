<?php

/**
 * Class Thing
 * 8. Consider Splitting Tasks into Steps: What do you do in the situations where a particular task consists of a dozen different unique steps? Well we've already reviewed a number of options in this series, including use-cases and events; however, another perfectly acceptable route is to extract each step into its own class, and then filter through an array of these bite-sized classes and trigger them. I'll show you how.
 */
class Thing
{
    /**
     * Chain of responsibility pattern?
     */
    public function handle()
    {
        $tasks = [
            DoThis::class,
            DoThat::class,
            RunSomething::class,
            EraseSomethingElse::class,
            AddFooToBar::class,
        ];

        foreach ($tasks as $task) {
            (new $task)->handle();
        }
    }
}

class DoThis
{
    public function handle()
    {
    }
}

class DoThat
{
    public function handle()
    {
    }
}

class RunSomething
{
    public function handle()
    {
    }
}

class EraseSomethingElse
{
    public function handle()
    {
    }
}

class AddFooToBar
{
    public function handle()
    {
    }
}
