<?php

namespace App\Livewire\Admin\Service;

use App\Facade\ServiceFactory;
use App\Models\Services;
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
        $this->myReset();
    }
    private function myReset()
    {
        $this->reset([
            'title',
            'description',
            'icon'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.service.form');
    }
}
