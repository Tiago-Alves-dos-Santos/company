<?php

namespace App\Livewire\Admin\CustomerCompany;

use App\Facade\ServiceFactory;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use WireUi\Traits\Actions;

class Form extends Component
{
    use Actions, WithFileUploads;
    public string $name = '';
    public string $client_name = '';
    public string $website = '';
    public $file = null;

    public function create()
    {
        $this->validate([
            'name' => ['required','min:3', 'max:100'],
            'client_name' => ['required','min:3', 'max:100'],
            'file' => ['required','image', 'mimes:jpg,png,jpeg']
        ]);
        $company = ServiceFactory::createCustomerCompany();
        $company->create([
            'name' => $this->name,
            'client_name' => $this->client_name,
            'website' => $this->website,
        ], $this->file);
        $this->reset([
            'name','client_name','website','file'
        ]);
        $this->notification()->success('Sucesso', 'Empresa cliente cadastrada com sucesso');
    }

    public function render()
    {
        return view('livewire.admin.customer-company.form');
    }
}
