<?php


namespace App;


class UserPresenter extends Presenter
{
    public function fullName()
    {
        return $this->model->first.' '.$this->model->last;
    }

    public function welcomeMessage()
    {
        return sprintf(
            'Welcome, %s. You Signed up %s.',
            $this->fullName(),
            $this->model->created_at->diffForHumans(),
        );
    }
}
