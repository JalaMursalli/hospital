<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/** Handle file upload */

function handleUpload($inputName, $model=null){
    try{
        if(request()->hasFile($inputName)){
            if($model && File::exists(public_path($model->{$inputName}))) {
                File::delete(public_path($model->{$inputName}));
            }

            $file = request()->file($inputName);
            $fileName = rand().$file->getClientOriginalName();
            $file->move(public_path('/uploads'), $fileName);

            $filePath = "/uploads/".$fileName;

            return $filePath;
        }
    }catch(\Exception $e){
        throw $e;
    }

}

/** Delete file */

function deleteFileIfExist($filePath){
    try{
        if(File::exists(public_path($filePath))){
            File::delete(public_path($filePath));
        }
    }catch(\Exception $e){
        throw $e;
    }
}
function generateUniqueSlug($model, $slugField, $title)
{
    $slug = Str::slug($title);
    $originalSlug = $slug;
    $i = 1;

    while ($model::where($slugField, $slug)->exists()) {
        $slug = $originalSlug . '-' . $i++;
    }

    return $slug;
}
function generateUniqueSlugForUpdate($model, $slugField, $title, $ignoreId)
{
    $slug = Str::slug($title);
    $originalSlug = $slug;
    $i = 1;

    while ($model::where($slugField, $slug)->where('id', '!=', $ignoreId)->exists()) {
        $slug = $originalSlug . '-' . $i++;
    }

    return $slug;
}


