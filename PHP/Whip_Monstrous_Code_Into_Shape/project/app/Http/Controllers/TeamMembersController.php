<?php

namespace App\Http\Controllers;

use App\Policies\AddTeamMemberPolicy;
use App\Team;
use Illuminate\Http\Request;

class TeamMembersController extends Controller
{
    /**
     * Add a new member to the given team.
     *
     * @param  Team  $team
     * @return string
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Team $team)
    {
//        (new AddTeamMemberPolicy($team))->allows();
        $this->authorize('store', $team);

        return 'Add the user to the team.';
    }
}
