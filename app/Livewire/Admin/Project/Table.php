<?php

namespace App\Livewire\Admin\Project;

use App\Models\Projects;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.admin.project.table', [
            'projects' => Projects::with('projectCategory')
            ->withCount('projectsImage')->paginate(10)
        ]);
    }
}
