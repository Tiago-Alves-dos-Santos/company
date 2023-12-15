<?php

namespace App\Livewire\Admin\Service;

use App\Models\Services;
use Livewire\Component;
use Livewire\Attributes\On;
use WireUi\Traits\Actions;

class Table extends Component
{
    use Actions;

    public function delete($id)
    {
        Services::where('id', $id)->forceDelete();
        // $this->dispatch('post-created');
    }

    public function render()
    {
        return view('livewire.admin.service.table', [
            'services' => Services::cursor()
        ]);
    }
}
