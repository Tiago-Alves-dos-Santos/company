<?php

namespace App\Services;

use App\Models\Company as CompanyModel;
use App\Traits\PublicUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

final class Company
{
    use PublicUpload;
    private $path = "img/company/";
    /**
     * Create or update a company, with or without logo
     *
     * @param array $data
     * @param UploadedFile|null $file
     * @param array $resize
     * @return void
     */
    public function save(array $data,  ?UploadedFile $file = null, array $resize = []): void
    {
        $operation = '';
        $company = null;
        if (CompanyModel::count() == 0) {
            $operation = 'create';
            $company = CompanyModel::create($data);
        } else if(CompanyModel::count() == 1) {
            $operation = 'update';
            $company = CompanyModel::first();
            $company->update($data);
        }

        if (!empty($file) && !empty($operation)) {
            if ($operation == 'create') {
                $company = $company->fresh();
            } else if ($operation == 'update' && File::exists(public_path($this->path . '.' . $company->logo))) {
                File::delete(public_path($this->path . '.' . $company->logo));
            }
            $newName = 'solucoes_software';
            $this->uploadImage($file, $this->path, $newName, $resize);
            $company->logo = $newName . '.' . $file->extension();
            $company->save();
        }
    }
    /**
     * Delete logo company
     *
     * @return void
     */
    public function deleteLogo():void
    {
        $company = CompanyModel::first();
        $file = public_path($this->path.$company->logo);
        if(File::exists($file)){
            File::delete($file);
            $company->logo = null;
            $company->save();
        }
    }
}
