<?php

namespace App\Livewire\Admin\CustomerCompany;

use App\Facade\ServiceFactory;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\CustomerCompany;
use Illuminate\Validation\Rule;

class FormUpdate extends Component
{
    use Actions, WithFileUploads;
    public string $name = '';
    public string $client_name = '';
    public string $website = '';
    public $file = null;
    public ?CustomerCompany $customer = null;
    public function mount(CustomerCompany $customer)
    {
        $this->customer = $customer;
        $this->name = $customer->name;
        $this->client_name = $customer->client_name;
        $this->website = $customer->website;
    }
    public function save()
    {
        $this->validate([
            'name' => ['required','min:3', 'max:100'],
            'client_name' => ['required','min:3', 'max:100'],
            'file' => [
                'nullable', 'image', 'mimes:jpg,png,jpeg',
                Rule::requiredIf(function () {
                    return is_null($this->file) ? false : true;
                })
            ]
        ]);
        $customer = ServiceFactory::createCustomerCompany();
        $customer->update($this->customer->id, [
            'name' => $this->name,
            'client_name' => $this->client_name,
            'website' => $this->website,
        ], $this->file);
        $this->reset('file');
        $this->notification()->success('Sucesso', 'Atualização feita com sucesso');
    }
    public function render()
    {
        return view('livewire.admin.customer-company.form-update');
    }
}
