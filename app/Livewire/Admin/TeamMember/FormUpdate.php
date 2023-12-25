<?php

namespace App\Livewire\Admin\TeamMember;

use App\Facade\ServiceFactory;
use App\Models\TeamMembers;
use App\Services\TeamMember;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;

class FormUpdate extends Component
{
    use Actions, WithFileUploads;
    public string $name = '';
    public string $work = '';
    public string $link_facebook = '';
    public string $link_instagram = '';
    public string $description = '';
    public $file;
    public $member;
    public function mount(TeamMembers $member)
    {
        $this->member = $member;
        $this->name = $member->name;
        $this->work = $member->work;
        $this->link_facebook = $member->facebook_link;
        $this->link_instagram = $member->instagram_link;
        $this->description = $member->description;
    }

    public function save()
    {
        $this->validate([
            'name' => ['required','min:5','max:50'],
            'work' => ['required','min:5','max:50'],
            'link_facebook' => ['required','url'],
            'link_instagram' => ['required','url'],
            'description' => ['required'],
        ]);
        $company = ServiceFactory::createTeamMember();
        $company->update($this->member->id, [
            'name' => $this->name,
            'work' => $this->work,
            'facebook_link' => $this->link_facebook,
            'instagram_link' => $this->link_instagram,
            'description' => $this->description,
        ], $this->file);
        $this->notification()->success('Sucesso', 'Atualização realizada com sucesso');
        $this->reset('file');
    }
    public function render()
    {
        return view('livewire.admin.team-member.form-update');
    }
}
