<?php

namespace App\Livewire\Admin\Service;

use Livewire\Component;
use App\Models\Services;
use WireUi\Traits\Actions;
use App\Facade\ServiceFactory;

class FormUpdate extends Component
{
    use Actions;
    public int $service_id = 0;
    public string $title;
    public string $icon;
    public string $description;
    public function mount(?Services $service = null)
    {
        $this->title = $service->title;
        $this->description = $service->description;
        $this->icon = $service->icon;
        $this->service_id = $service->id;
    }
    public function edit()
    {
        $this->validate([
            'title' => ['required', 'min:5', 'max:50'],
            'icon' => ['required', 'min:5', 'max:30'],
            'description' => ['required']
        ]);
        $service = ServiceFactory::createService();
        $service = $service->update($this->service_id,[
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon
        ]);
        $this->notification()->success('Sucesso', "$service registro atualizado!");
    }
    public function render()
    {
        return view('livewire.admin.service.form-update');
    }
}
