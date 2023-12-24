<?php

namespace App\Livewire\Admin\TeamMember;

use App\Facade\ServiceFactory;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        $team = ServiceFactory::createTeamMember();
        return view('livewire.admin.team-member.table', [
            'teams' => $team->getAll()
        ]);
    }
}
