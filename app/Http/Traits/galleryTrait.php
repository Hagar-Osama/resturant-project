<?php
namespace App\Http\Traits;

trait galleryTrait {
    public function getGallById($id)
    {
        return $this->gallModel::find($id);
    }
    private function getGalleries()
    {
        return $this->gallModel::get();
    }

}

trait galleryFileTrait {
    public function uploadFile($file, $path, $filename, $oldFile = null)
    {
        return $file->move(public_path('images/'.$path),$filename);
        if(! is_null($oldFile)) {
            unlink(public_path($oldFile));
        }
    }


}

