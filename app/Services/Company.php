<?php

namespace App\Services;

use App\Models\Company as CompanyModel;
use App\Traits\PublicUpload;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

final class Company
{
    use PublicUpload;
    /**
     * Create or update a company, with or without logo
     *
     * @param array $data
     * @param UploadedFile|null $file
     * @param array $resize
     * @return void
     */
    public function save(array $data,  ?UploadedFile $file, array $resize = []):void
    {
        $operation = '';
        $company = null;
        if (CompanyModel::count() == 0) {
            $operation = 'create';
            $company = CompanyModel::create($data);
        } else {
            $operation = 'update';
            $company = CompanyModel::first();
            $company->update($data);
        }

        if (!empty($file)) {
            $path = "img/company/";
            if($operation == 'create'){
                $company = $company->fresh();
            }else if($operation == 'update' && File::exists(public_path($path.'.'.$company->logo))){
                File::delete(public_path($path.'.'.$company->logo));
            }
            $newName = 'solucoes_software';
            $this->uploadImage($file, $path,$newName,$resize);
            $company->logo = $newName.'.'.$file->extension();
            $company->save();
        }
    }

}
