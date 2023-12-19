<?php

namespace App\Livewire\Admin\Project;

use App\Facade\ServiceFactory;
use Livewire\Component;
use App\Models\Projects;
use WireUi\Traits\Actions;
use App\Models\ProjectCategory;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class FormUpdate extends Component
{
    use Actions, WithFileUploads;
    public int $category_id = 0;
    public int $project_id = 0;
    public string $title = '';
    public string $description = '';
    public string $client_name = '';
    public string $website = '';
    public string $company_name = '';
    public  $file = null;

    public function mount(Projects $project)
    {
        $this->category_id = $project->projectCategory->id;
        $this->project_id = $project->id;
        $this->title = $project->title;
        $this->description = $project->description;
        $this->client_name = $project->client_name;
        $this->website = $project->website;
        $this->company_name = $project->company_name;
    }

    public function save()
    {
        $this->validate([
            'category_id' => ['required','integer','min:1'],
            'title' => ['required','min:4','max:255'],
            'description' => ['required','min:10'],
            'company_name' => ['required','min:4','max:255'],
        ]);
        $result = ServiceFactory::createProject()->update($this->project_id, [
            'project_category_id' => $this->category_id,
            'title' => $this->title,
            'description' => $this->description,
            'client_name' => $this->client_name,
            'website' => $this->website,
            'company_name' => $this->company_name,
        ]);
        $this->notification()->success('Sucesso', $result.' registro atualizado');
    }

    public function render()
    {
        return view('livewire.admin.project.form-update', [
            'categories' => ProjectCategory::get(['title', 'id'])->toArray()
        ]);
    }
}
