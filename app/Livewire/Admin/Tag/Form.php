<?php

namespace App\Livewire\Admin\Tag;

use App\Facade\ServiceFactory;
use App\Models\Content;
use App\Models\Tag;
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
    public ?Tag $tags = null;
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
        $msg = '';
        switch ($this->operation) {
            case 'create':
                $this->create();
                $msg = 'Tag cadastrada com sucesso';
                $this->dispatch('close-modal', modal_close_id: 'close-modal-button');
                $this->dispatch('refresh');
                break;
            case 'update':
                $this->edit();
                $msg = 'Tag atualizada com sucesso';
                $this->dispatch('close-modal', modal_close_id: 'update-tag-close');
                break;

            default:
                # code...
                break;
        }
        $this->notification()->success('Sucesso', $msg);
        $this->dispatch('reload-tags-table');
        $this->dispatch('reload.content.main');
    }

    #[On('tag.form.loadUpdate')]
    public function loadUpdate($id)
    {
        $this->tags = Tag::find($id);
        $this->title = $this->tags->title;
        $this->surname = $this->tags->surname;
        $this->visible = $this->tags->visible;
    }
    #[On('tag.form.myReset')]
    public function myReset()
    {
        $this->reset(['title', 'surname','tags']);
    }
    public function create()
    {
        $tag = ServiceFactory::createTag();
        $tag->createWithContent([
            'title' => $this->title,
            'surname' => $this->surname,
        ]);
        $this->myReset();
    }
    public function edit()
    {
        $this->tags->update([
            'surname' => $this->surname,
            'visible' => filter_var($this->visible, FILTER_VALIDATE_BOOLEAN),
        ]);
    }
    public function render()
    {
        return view('livewire.admin.tag.form');
    }
}
