<?php

namespace App\Services;

use App\Models\Team;

class TeamService
{
    public static function getTeamById($id): ?Team
    {
        return Team::query()->where('id', $id)->first();
    }
}
