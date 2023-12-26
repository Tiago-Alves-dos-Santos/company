<?php

namespace App\Livewire\Admin\Admin;

use App\Actions\Fortify\CreateNewUser;
use App\Facade\ServiceFactory;
use Livewire\Component;
use WireUi\Traits\Actions;

class Form extends Component
{
    use Actions;
    public string $name = '';
    public string $email ='';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $level = false;
    public function create()
    {
        $admin = new CreateNewUser();
        $admin->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'level' => $this->level
        ]);
        $this->dispatch('close-modal', modal_close_id: 'close-modal-button');
        $this->dispatch('admin.admin.table.render');
        $this->notification()->success('Succeso','Cadastro realizado com sucesso');
        $this->reset([
            'name','email','password','password_confirmation','level'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.admin.form');
    }
}
