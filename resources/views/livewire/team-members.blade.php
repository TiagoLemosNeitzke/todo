<div>
    <div class="flex items-center">
        @foreach($this->teamMembers as $teamMember)
            @if($teamMember->team_id === $teamId)
                <span class="pr-2">{{$teamMember->user_name}}</span>
            @endif
        @endforeach
    </div>
</div>
