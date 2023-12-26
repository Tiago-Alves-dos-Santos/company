<?php

namespace App\Livewire\Admin\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Table extends Component
{
    #[On('admin.admin.table.render')]
    public function render()
    {
        return view('livewire.admin.admin.table', [
            'admins' => User::where('id', '!=', Auth::id())->get()
        ]);
    }
}
