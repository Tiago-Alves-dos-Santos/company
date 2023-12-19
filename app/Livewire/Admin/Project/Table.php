<?php

namespace App\Livewire\Admin\Project;

use App\Facade\ServiceFactory;
use App\Models\Projects;
use Livewire\Component;
use WireUi\Traits\Actions;

class Table extends Component
{
    use Actions;
    public function delete(int $project_id)
    {
        $project = ServiceFactory::createProject();
        $project->delete($project_id);
        $this->notification()->success('Succeso', 'Projeto e todas suas imagens deletadas');
    }
    public function render()
    {
        return view('livewire.admin.project.table', [
            'projects' => Projects::with('projectCategory')
                ->withCount('projectsImage')->paginate(10)
        ]);
    }
}
