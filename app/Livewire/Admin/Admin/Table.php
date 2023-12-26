<?php

namespace App\Livewire\Admin\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Table extends Component
{
    public function render()
    {
        return view('livewire.admin.admin.table', [
            'admins' => User::where('id', '!=', Auth::id())->get()
        ]);
    }
}
