<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class FormLogin extends Component
{
    public string $email = '';
    public function render()
    {
        return view('livewire.admin.form-login');
    }
}
