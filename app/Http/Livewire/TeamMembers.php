<?php

namespace App\Http\Livewire;

use App\Models\TeamMember;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Integer;

class TeamMembers extends Component
{
    public $teamMembers;
    public $teamId = null;

    public function mount()
    {
       $this->teamMembers = TeamMember::get();
    }
    public function render()
    {
        return view('livewire.team-members');
    }
}
