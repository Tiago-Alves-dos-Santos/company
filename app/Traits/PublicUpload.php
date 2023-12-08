<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait PublicUpload
{
    /**
     * Uploads a image file for public path
     *
     * @param UploadedFile $file
     * @param string $path
     * @param string $newName
     * @param array $resize
     * @return void
     */
    public function uploadImage(UploadedFile $file, string $path, $newName = '', array $resize = [])
    {
        if ($file instanceof UploadedFile && $file->isValid()) {
            $local = $path . $newName . '.' . $file->extension();
            if (!File::exists($path)) {
                File::makeDirectory($path);
            }
            if (!empty($resize)) { //to do resize
                $image = Image::make($file->getRealPath());
                $image->resize($resize[0], $resize[1]);
                $image->save(public_path($local));
            } else {
                File::put($local, file_get_contents($file->getRealPath()));
            }
        }else{
            throw new \Exception("Invalid upload file. Expected UploadedFile, but received: '".get_debug_type($file) ."'");
        }
    }
}
