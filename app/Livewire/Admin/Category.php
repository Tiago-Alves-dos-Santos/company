<?php

namespace App\Livewire\Admin;

use App\Facade\ServiceFactory;
use Livewire\Component;
use WireUi\Traits\Actions;

class Category extends Component
{
    use Actions;
    public string $title = '';
    public function create()
    {
        $this->validate([
            'title' => ['required', 'min:4', 'max:255']
        ]);
        $category = ServiceFactory::createProjectCategory();
        $category->create([
            'title' => $this->title,
        ]);
        $this->cancel();
    }
    public function edit()
    {
    }
    public function loadEdit()
    {
    }
    public function cancel()
    {
        $this->reset('title');
    }
    public function search()
    {
    }
    public function delete()
    {
    }
    public function render()
    {
        return view('livewire.admin.category');
    }
}
