<?php

namespace App\Policies;

use App\Team;

class AddTeamMemberPolicy
{
    /**
     * @var Team
     */
    private Team $team;

    /**
     * Create a new policy instance.
     *
     * @param  Team  $team
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function allows()
    {
        // If you are not signed in, no way.
        if (auth()->guest()) {
            abort(403, 'You are not signed in.');
        }

        // If you are not the owner of the team, no way.
        if ($this->team->owner_id != auth()->user()->id) {
            abort(403, 'You are no the owner of this team.');
        }

        // If the team is maxed out, no way.
        if ($this->team->isMaxedOut()) {
            abort(403, 'Your team is maxed out.');
        }
    }
}
