<?php

namespace App\Services;

use App\Models\CustomerCompany as ModelsCustomerCompany;
use App\Models\Tag;
use App\Services\Abstracts\WebSiteSections;
use App\Traits\PublicUpload;
use Illuminate\Http\UploadedFile;

final class CustomerCompany extends WebSiteSections
{
    use PublicUpload;
    private $path = "img/customer_company/";
    public function __construct()
    {
        parent::__construct();
        $this->tag_name = 'tag_customer_company';
    }
    public function create(array $data, UploadedFile $file, array $resize = []): ModelsCustomerCompany
    {
        parent::createParent();
        $data = [
            ...$data,
            'tag_id' => $this->model_tag->id,
        ];
        $company = ModelsCustomerCompany::create($data);
        $company = $company->fresh();
        $newName = uniqid(str_replace(" ", "_", $data['name']) . '_');
        $this->uploadImage($file, $this->path, $newName, $resize);
        $company->logo = $newName . '.' . $file->extension();
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
            'surname' => 'logomarcas de clientes das empresas'
        ]);
    }
}
