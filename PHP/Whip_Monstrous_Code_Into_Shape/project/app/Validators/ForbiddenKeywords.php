<?php

namespace App\Validators;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ForbiddenKeywords
{
    /**
     * A list of common spam keywords.
     *
     * @var string[]
     */
    protected $keywords = [
        'megavideo',
        'HD Streaming Online'
    ];

    /**
     * @param  Request  $request
     * @throws ValidationException
     */
    public function search(Request $request)
    {
        foreach ($this->keywords as $spam) {
            if (stripos($request->body, $spam) !== false) {
                throw new ValidationException;
            }
        }
    }
}
