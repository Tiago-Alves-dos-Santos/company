<?php

namespace App\Livewire\Admin\Service;

use App\Facade\ServiceFactory;
use App\Services\Tag;
use Livewire\Component;
use WireUi\Traits\Actions;

class Form extends Component
{
    use Actions;
    public int $tag_id;
    public string $title;
    public string $icon;
    public string $description;
    // public  $description;
    public function mount($operation = 'create')
    {
        if ($operation == 'update') {
            $this->loadEdit();
        }
    }
    public function create()
    {
        $this->validate([
            'title' => ['required', 'min:5', 'max:50'],
            'icon' => ['required', 'min:5', 'max:30'],
            'description' => ['required']
        ]);
        $service = ServiceFactory::createService();
        $service = $service->create([
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon
        ]);
        $this->notification()->success('Sucesso', "Serviço: {$service->title} cadastrado!");
        $this->dispatch('admin.service.table.reload');
    }
    private function loadEdit()
    {
    }
    public function edit()
    {
        $this->validate([
            'title' => ['required', 'min:5', 'max:50'],
            'icon' => ['required', 'min:5', 'max:30'],
            'description' => ['required']
        ]);
    }
    public function render()
    {
        return view('livewire.admin.service.form');
    }
}
