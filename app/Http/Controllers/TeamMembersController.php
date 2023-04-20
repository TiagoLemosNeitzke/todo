<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use App\Services\TeamMemberService;
use App\Services\TeamService;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Traits\NotificationTrait;

class TeamMembersController extends Controller
{
    use NotificationTrait;
    public function addMemberForm(Request $request)
    {
        return view('teamMembers.addMemberForm',[
            'team' => $request->get('id'),
        ]);
    }

    public function removeMemberForm(Request $request)
    {
        return view('teamMembers.removeMemberForm',[
            'team' => $request->get('id'),
        ]);
    }

    public function addMember(Request $request)
    {
        $user = UserService::getUserByEmail($request->get('email'));
        $team = TeamService::getTeamById($request->get('team'));
        if ($user != null && $team != null) {
            $teamMember = TeamMemberService::getTeamMemberByUserIdAndTeamId($user->id, $team->id);

            if ($teamMember == null) {
                TeamMember::query()->create([
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'team_id' => $team->id,
                    'team_name' => $team->name,
                ]);
                return $this->HandleNotificationView('success', 'User add to team successfully!', $request->session()->all()['_previous']['url']);
            }else{
                return $this->HandleNotificationView('error', 'User already in team!', $request->session()->all()['_previous']['url']);
            }
        }
        return $this->HandleNotificationView('error', 'User or team not found!', $request->session()->all()['_previous']['url']);
    }

    public function removeMember(Request $request)
    {
        $user = UserService::getUserByEmail($request->get('email'));
        $teamMember = TeamMember::query()->where('user_id', $user->id)->where('team_id', $request->get('team'))->first();

        $teamMember->delete();
        return $this->HandleNotificationView('success', 'User removed from team successfully!', $request->session()->all()['_previous']['url']);
    }
}
