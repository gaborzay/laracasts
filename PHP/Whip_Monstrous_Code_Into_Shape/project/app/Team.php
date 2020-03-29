<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function isOwnedBy($user)
    {
        return $this->owner_id == $user->id;
    }

    public function isMaxedOut()
    {
        return true;
    }
}
