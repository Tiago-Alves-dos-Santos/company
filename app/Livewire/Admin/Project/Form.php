<?php

namespace App\Livewire\Admin\Project;

use App\Facade\ServiceFactory;
use App\Models\ProjectCategory;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use WireUi\Traits\Actions;

class Form extends Component
{
    use Actions, WithFileUploads;
    public int $category_id = 0;
    public string $title = '';
    public string $description = '';
    public string $client_name = '';
    public string $website = '';
    public string $company_name = '';
    public  $file = null;

    public function create()
    {
        $this->validate([
            'category_id' => ['required','integer','min:1'],
            'title' => ['required','min:4','max:255'],
            'description' => ['required','min:10'],
            'company_name' => ['required','min:4','max:255'],
        ]);
        $project = ServiceFactory::createProject();
        $result = $project->create([
            'title' => $this->title,
            'description' => $this->description,
            'client_name' => $this->client_name,
            'website' => $this->website,
            'company_name' => $this->company_name,
        ], $this->category_id, $this->file);
        $this->reset([
            'category_id', 'title', 'description', 'client_name', 'website','company_name','file'
        ]);
        $this->notification()->success('Sucesso', "Projeto criado");
        $this->notification()->info('Fotos do projeto', $result->count_images." foto(s) do projeto foram inseridas.");
    }
    public function render()
    {
        return view('livewire.admin.project.form', [
            'categories' => ProjectCategory::get(['title','id'])->toArray()
        ]);
    }
}
