<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamCreateRequest;
use App\Models\Team;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        return view('team.index', [
            'teams' => Team::query()->paginate(6),
        ]);
    }

    public function create()
    {
        return view('team.create');
    }

    public function store(TeamCreateRequest $request, Team $team)
    {
        $this->authorize('create', $team);
        $team = Team::query()->create([
            'name' => $request->validated('name'),
            'user_id' => auth()->id(),
        ]);

        TeamMember::query()->create([
            'team_id' => $team->id,
            'team_name' => $team->name,
            'user_id' => $team->user_id,
            'user_name' => auth()->user()->name,
        ]);
        return redirect()->route('teams.index')->with(['id' => $team->id]);
    }
    public function destroy(string $id)
    {
        $this->authorize('delete', Team::query()->findOrFail($id));
        Team::query()->findOrFail($id)->delete();
        return redirect()->route('teams.index');
    }
}
