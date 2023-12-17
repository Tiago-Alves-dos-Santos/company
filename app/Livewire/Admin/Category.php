<?php

namespace App\Livewire\Admin;

use App\Facade\ServiceFactory;
use App\Models\ProjectCategory;
use Livewire\Component;
use WireUi\Traits\Actions;

class Category extends Component
{
    use Actions;
    public string $title = '';
    public int $editing_id = 0;
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
        ProjectCategory::find($this->editing_id)->update([
            'title' => $this->title,
        ]);
        $this->cancel();
        $this->notification()->success('Sucesso', 'Categoria atualizada');
    }
    public function loadEdit(ProjectCategory $category)
    {
        $this->title = $category->title;
        $this->editing_id = $category->id;
    }
    public function cancel()
    {
        $this->reset([
            'title','editing_id'
        ]);
    }
    public function search(string $search = '')
    {
       $result =  empty($search) ?
       ProjectCategory::cursor()
       :
       ProjectCategory::where('title','like',"%$search%")->cursor();
       return $result;
    }
    public function delete()
    {
    }
    public function render()
    {
        return view('livewire.admin.category', [
            'categories' => $this->search($this->title),
        ]);
    }
}
