<?php

namespace App\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;
use WireUi\Traits\Actions;

class Form extends Component
{
    use Actions;
    public string $title;
    public string $surname;
    public bool $visivle;
    public function save(): void
    {
        $this->validate([
            'title' => ['required','min:3'],
            'surname' => ['required','min:3'],
        ]);
        Tag::create([
            'title' => $this->title,
            'surname' => $this->surname
        ]);
        $this->dispatch('close-modal', close_class: 'close-modal-button');
        $this->notification()->success('Sucesso', 'Nova tag cadastrada');
    }
    public function render()
    {
        return view('livewire.admin.tag.form');
    }
}
