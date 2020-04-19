<?php

namespace App\Validators;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class KeyHeldDown
{
    /**
     * Ensure that the user did not hold down a key
     * to quickly spam a thread.
     *
     * @param  Request  $request
     * @throws ValidationException
     */
    public function search(Request $request)
    {
        // Like: "sdddddddddddddd"
        if (preg_match("/(.)\\1{3,}/u", $request->title)) {
            throw new ValidationException;
        }
    }
}
