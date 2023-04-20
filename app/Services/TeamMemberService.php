<?php

namespace App\Services;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use phpDocumentor\Reflection\Types\Integer;

class TeamMemberService
{
    public static function getTeamMemberByUserIdAndTeamId( $userId,  $teamId): ?TeamMember
    {
        return TeamMember::query()->where('user_id', $userId)->where('team_id', $teamId)->first();
    }
}
