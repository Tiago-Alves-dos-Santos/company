<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\TeamMembers;
use App\Traits\PublicUpload;
use Illuminate\Http\UploadedFile;
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
