<?php

// Publisher
interface Subject
{
    public function attach($observer);

    public function detach($observer);

    public function notify();
}

// Subscriber
interface Observer
{
    public function handle();
}

class Login implements Subject
{
    protected array $observers = [];

    public function attach($observable)
    {
        if (is_array($observable)) {
            return $this->attachObservers($observable);
        }

        $this->observers[] = $observable;
    }

    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }

    public function attachObservers($observable): void
    {
        foreach ($observable as $observer) {
            if (!$observer instanceof Observer) {
                throw new Exception;
            }
            $this->attach($observer);
        }
    }

    public function fire()
    {
        // perform the login
        $this->notify();
    }
}

class LogHandler implements Observer
{
    public function handle()
    {
        var_dump('log something important');
    }
}

class EmailNotifier implements Observer
{
    public function handle()
    {
        var_dump('fire off email');
    }
}

class LoginReporter implements Observer
{
    public function handle()
    {
        var_dump('do some reporting');
    }
}

$login = new Login;
$login->attach([
    new LogHandler,
    new EmailNotifier,
    new LoginReporter
]);

$login->fire();
