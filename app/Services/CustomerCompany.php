<?php

namespace App\Services;

use App\Models\Tag;
use App\Traits\PublicUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use App\Services\Abstracts\WebSiteSections;
use App\Models\CustomerCompany as ModelsCustomerCompany;

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
    public function update(int $id,array $data, ?UploadedFile $file = null, array $resize = [])
    {
        $company = ModelsCustomerCompany::find($id);
        $company->update($data);
        $old_file = public_path($this->path.$company->logo);
        if(!empty($file) && File::exists($old_file)){
            File::delete($old_file);
            //new file
            $newName = uniqid(str_replace(" ", "_", $data['name']) . '_');
            $this->uploadImage($file, $this->path, $newName, $resize);
            $company->logo = $newName . '.' . $file->extension();
            $company->save();
        }
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
