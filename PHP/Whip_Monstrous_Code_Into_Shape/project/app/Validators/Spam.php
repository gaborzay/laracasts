<?php

namespace App\Validators;

class Spam
{
    /**
     * Spam checkers.
     *
     * @var array
     */
    protected $checks = [
        ForbiddenKeywords::class,
        KeyHeldDown::class,
        Korean::class,
        CaptchaWasClicked::class,
        JeffreyIsStupid::class
    ];

    /**
     * Ensure that the message does not contain any spam.
     *
     * @param  Request $request
     * @throws ValidationException
     */
    public function search(Request $request)
    {
        foreach ($this->checks as $class) {
            app($class)->search($request);
        }
    }
}
