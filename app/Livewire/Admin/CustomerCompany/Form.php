<?php

namespace App\Livewire\Admin\CustomerCompany;

use Livewire\Component;

class Form extends Component
{
    public string $name = '';
    public string $client_name = '';
    public string $website = '';
    public $file = null;

    public function create()
    {
        $this->validate([
            'name' => ['required','min:3', 'max:100'],
            'client_name' => ['required','min:3', 'max:100'],
            'website' => ['required','url','max:255'],
            'file' => ['required','image', 'mimes:jpg,png,jpeg']
        ]);

        $this->reset([
            'name','client_name','website','file'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.customer-company.form');
    }
}
