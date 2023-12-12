<?php

namespace App\Livewire\Admin\Tag;

use App\Models\Tag;
use Illuminate\Console\View\Components\Task;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\Attributes\On;

class Form extends Component
{
    use Actions;
    public string $title;
    public string $surname;
    public bool $visible;
    public string $operation;
    private Tag $task;
    public function mount($operation = 'create')
    {
        $this->operation = $operation;
    }
    public function save(): void
    {
        $this->validate([
            'title' => ['required', 'min:3'],
            'surname' => ['required', 'min:3'],
        ]);
        Tag::create([
            'title' => $this->title,
            'surname' => $this->surname
        ]);
        $this->dispatch('close-modal', modal_close_id: 'close-modal-button');
        $this->dispatch('reload-tags-table');
        $this->notification()->success('Sucesso', 'Nova tag cadastrada');
        $this->reset(['title', 'surname']);
    }

    #[On('tag.form.loadUpdate')]
    public function loadUpdate($id)
    {
        $this->task = Tag::find($id);
        $this->title = $this->task->title;
        $this->surname = $this->task->surname;
        $this->visible = $this->task->visible;
    }
    #[On('tag.form.myReset')]
    public function myReset()
    {
        $this->reset(['title','surname']);
    }

    public function update()
    {
        $this->validate([
            'title' => ['required', 'min:3'],
            'surname' => ['required', 'min:3'],
        ]);
        $this->task->update([
            'title' => $this->title,
            'surname' => $this->surname
        ]);
    }
    public function render()
    {
        return view('livewire.admin.tag.form');
    }
}
