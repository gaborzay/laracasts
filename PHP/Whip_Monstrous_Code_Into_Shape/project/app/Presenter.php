<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

abstract class Presenter
{
    /**
     * @var Model
     */
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function __get($name) // $user->present()->welcomeMessage
    {
        if (method_exists($this, $name)) {
            return call_user_func([$this, $name]);
        }

        $message = "%s does not response to the %s property or method.";

        throw new \Exception(sprintf($message, static::class, $name));
    }
}
