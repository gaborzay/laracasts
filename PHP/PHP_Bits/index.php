<?php

/**
 * 1. Visual Debt
 * 2. A Clean PHPUnit Workflow in PHP
 * 3. Array Destructuring
 * 4. Single-Use Traits
 * 5. Better Interface with Ternaries
 * 6. Invokable Classes
 * 7. Seek Out Repeated Suffixes
 * 8. Reflect Into Functions
 */

/**
 * 1. Visual Debt
 */
//interface EventDispatcher
//{
//    public function listen(string $name, callable $handler): void;
//
//    public function fire(string $name): bool;
//}
//
//final class SyncDispatcher implements EventDispatcher
//{
//    protected array $events = [];
//
//    public function listen(string $name, callable $handler): void
//    {
//        $this->events[$name][] = $handler;
//    }
//
//    public function fire(string $name): bool
//    {
//        if (!array_key_exists($name, $this->events)) {
//            return false;
//        }
//
//        foreach ($this->events[$name] as $event) {
//            $event();
//        }
//
//        return true;
//    }
//}

class SyncDispatcher
{
    protected array $events = [];

    public function listen($name, $handler)
    {
        $this->events[$name][] = $handler;
    }

    public function fire($name)
    {
        if (!array_key_exists($name, $this->events)) {
            return false;
        }

        foreach ($this->events[$name] as $event) {
            $event();
        }

        return true;
    }
}