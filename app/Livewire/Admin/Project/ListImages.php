<?php

namespace App\Livewire\Admin\Project;

use App\Facade\ServiceFactory;
use Livewire\Component;
use App\Models\Projects;
use App\Services\ProjectImage;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ListImages extends Component
{
    use Actions, WithFileUploads, WithPagination;
    public ?Projects $project = null;
    public $file = null;
    public function mount(Projects $project)
    {
        $this->project = $project;
    }
    public function remove($id)
    {
        $image = ServiceFactory::createProjectImage();
        $image->setProject($this->project);
        $image->delete($id);
        $this->notification()->success('Sucesso', 'Imagen removida com sucesso.');
    }
    public function add()
    {
        if (!empty($this->file)) {
            $image = ServiceFactory::createProjectImage();
            $image->setProject($this->project);
            $image->upload($this->file);
            $this->reset('file');
        } else {
            $this->notification()->warning('Atenção', 'Nenhum arquivo de upload encotrado.');
        }
    }
    public function render()
    {
        $image = ServiceFactory::createProjectImage();
        return view('livewire.admin.project.list-images', [
            'images' => $image->listImagesToProject($this->project->id),
            'project' => $this->project
        ]);
    }
}
