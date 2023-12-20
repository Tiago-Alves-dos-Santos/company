<?php

namespace App\Livewire\Admin\CustomerCompany;

use App\Models\CustomerCompany;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;

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
    }
    public function save()
    {
        $this->validate([
            'name' => ['required','min:3', 'max:100'],
            'client_name' => ['required','min:3', 'max:100'],
            'file' => ['required','image', 'mimes:jpg,png,jpeg']
        ]);
    }
    public function render()
    {
        return view('livewire.admin.customer-company.form-update');
    }
}
