<?php

namespace App\Livewire\Admin\TeamMember;

use App\Facade\ServiceFactory;
use App\Services\ServiceFactory as ServicesServiceFactory;
use Livewire\Component;
use WireUi\Traits\Actions;

class Table extends Component
{
    use Actions;
    public function delete(int $id){
        $company = ServiceFactory::createTeamMember();
        $company->delete($id);
        $this->notification()->success('Sucesso', 'Deleção realizada com sucesso');
    }
    public function render()
    {
        $team = ServiceFactory::createTeamMember();
        return view('livewire.admin.team-member.table', [
            'teams' => $team->getAll()
        ]);
    }
}
