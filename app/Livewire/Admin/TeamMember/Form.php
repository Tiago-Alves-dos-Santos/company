<?php

namespace App\Livewire\Admin\TeamMember;

use App\Facade\ServiceFactory;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Form extends Component
{
    use Actions, WithFileUploads;
    public string $name = '';
    public string $work = '';
    public string $link_facebook = '';
    public string $link_instagram = '';
    public string $description = '';
    public $file;
    public function create()
    {
        $this->validate([
            'name' => ['required','min:5','max:50'],
            'work' => ['required','min:5','max:50'],
            'link_facebook' => ['required','url'],
            'link_instagram' => ['required','url'],
            'description' => ['required'],
            'file' => ['required','image', 'mimes:jpg,png,jpeg'],
        ]);
        $member = ServiceFactory::createTeamMember();
        $member->create([
            'name' => $this->name,
            'work' => $this->work,
            'facebook_link' => $this->link_facebook,
            'instagram_link' => $this->link_instagram,
            'description' => $this->description,
        ], $this->file);
        $this->notification()->success('Sucesso', 'Cadastro realizado com sucesso');
        $this->reset([
            'name','work','link_facebook','link_instagram','description', 'file'
        ]);
    }
    public function render()
    {
        return view('livewire.admin.team-member.form');
    }
}
