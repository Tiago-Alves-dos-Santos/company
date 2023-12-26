<?php

namespace App\Livewire\Admin\Admin;

use App\Facade\ServiceFactory;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use WireUi\Traits\Actions;

class Table extends Component
{
    use Actions;
    public function delete(int $id)
    {
        ServiceFactory::createAdmin()->delete($id);
        $this->notification()->success('Sucesso','Eclusão realizada com sucesso');
    }
    #[On('admin.admin.table.render')]
    public function render()
    {
        return view('livewire.admin.admin.table', [
            'admins' => User::where('id', '!=', Auth::id())->get()
        ]);
    }
}
