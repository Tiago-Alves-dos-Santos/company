<?php

namespace App\Livewire\Admin\Content;

use App\Models\Content;
use Livewire\Component;
use Livewire\Attributes\On;

class Main extends Component
{
    #[On('reload.content.main')]
    public function render()
    {
        return view('livewire.admin.content.main', [
            'contents' => Content::get()
        ]);
    }
}
