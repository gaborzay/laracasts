<?php

namespace App\Policies;

use App\Team;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamMemberPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function store(User $user, Team $team) // $this->authorize($team);
    {
        // If you are not the owner of the team, no way.
        if (!$team->isOwnedBy($user)) {
            abort(403, 'You are no the owner of this team.');
        }

        // If the team is maxed out, no way.
        if ($team->isMaxedOut()) {
            abort(403, 'Your team is maxed out.');
        }

        return true;
    }
}
