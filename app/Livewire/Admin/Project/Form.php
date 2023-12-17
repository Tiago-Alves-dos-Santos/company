<?php

namespace App\Livewire\Admin\Project;

use Livewire\Component;
use WireUi\Traits\Actions;

class Form extends Component
{
    use Actions;
    public int $category_id = 0;
    public string $title = '';
    public string $description = '';
    public string $client_name = '';
    public string $website = '';
    public string $company_name = '';

    public function create()
    {
        $this->validate([
            'title' => ['required','min:4','max:255'],
            'description' => ['required','min:10'],
            'company_name' => ['required','min:4','max:255'],
        ]);
    }

    public function render()
    {
        return view('livewire.admin.project.form');
    }
}
