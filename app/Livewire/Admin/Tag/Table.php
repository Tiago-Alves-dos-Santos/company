<?php
namespace App\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;
use Livewire\Attributes\On;

class Table extends Component
{
    #[On('reload-tags-table')]
    public function render()
    {
        return view('livewire.admin.tag.table', [
            'tags' => Tag::all()
        ]);
    }
}
