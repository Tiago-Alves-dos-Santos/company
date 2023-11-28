<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class FormLogin extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember_me = false;
    public function render()
    {
        return view('livewire.admin.form-login');
    }
}
