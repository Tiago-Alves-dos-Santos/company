<?php

namespace App\Livewire\Admin\Project;

use App\Facade\ServiceFactory;
use App\Models\ProjectImages;
use Livewire\Component;
use App\Models\Projects;

class ListImages extends Component
{
    public ?Projects $project = null;
    public $file;
    public function mount(Projects $project)
    {
        $this->project = $project;
    }
    public function remove()
    {
    }
    public function add(){

    }
    public function render()
    {
        $images = ServiceFactory::createProjectImage();
        return view('livewire.admin.project.list-images', [
            'images' => $images->listImagesToProject($this->project->id),
            'project' => $this->project
        ]);
    }
}
