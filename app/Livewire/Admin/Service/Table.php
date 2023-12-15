<?php

namespace App\Livewire\Admin\Service;

use App\Models\Services;
use Livewire\Component;
use Livewire\Attributes\On;

class Table extends Component
{
    #[On('admin.service.table.reload')]
    public function render()
    {
        return view('livewire.admin.service.table',[
            'services' => Services::cursor()
        ]);
    }
}
