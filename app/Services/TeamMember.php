<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\TeamMembers;
use App\Traits\PublicUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Services\Abstracts\WebSiteSections;

final class TeamMember extends WebSiteSections
{
    use PublicUpload;
    private $path = "img/members/";
    public function __construct()
    {
        parent::__construct();
        $this->tag_name = 'TAG_TEAM_MEMBERS';
    }

    public function create(array $data, UploadedFile $file, array $resize = [])
    {
        parent::createParent();
        $data = [
            ...$data,
            'tag_id' => $this->model_tag->id,
        ];
        $company = TeamMembers::create($data);
        $company = $company->fresh();
        $newName = uniqid(str_replace(" ", "_", $data['name']) . '_');
        $this->uploadImage($file, $this->path, $newName, $resize);
        $company->profile_picture = $newName . '.' . $file->extension();
        $company->save();
        return $company;
    }
    public function update(int $id,array $data, ?UploadedFile $file = null, array $resize = [])
    {
        $company = TeamMembers::find($id);
        $company->update($data);
        if(!empty($file) && File::exists(public_path($this->path.$company->profile_picture))){
            File::delete(File::exists(public_path($this->path.$company->profile_picture)));
            $newName = uniqid(str_replace(" ", "_", $data['name']) . '_');
            $this->uploadImage($file, $this->path, $newName, $resize);
            $company->profile_picture = $newName . '.' . $file->extension();
            $company->save();
        }
        return $company;
    }
    public function getAll()
    {
        $team = TeamMembers::all();
        $team->transform(function ($value) {
            $value->profile_picture = $this->path . $value->profile_picture;
            return $value;
        });
        return $team;
    }
    public function existTagService(): bool
    {
        return $this->tag->existTag($this->tag_name);
    }
    protected function createTagService(): Tag
    {
        return $this->tag->create([
            'title' => $this->tag_name,
            'surname' => 'Exibição de membros da equipe'
        ]);
    }
}
