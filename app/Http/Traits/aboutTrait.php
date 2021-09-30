<?php
namespace App\Http\Traits;

trait aboutTrait {
    public function getAboutById($id)
    {
        return $this->aboutModel::find($id);
    }

    public function getAbout()
    {
        return $this->aboutModel::get();
    }

}
trait aboutFileTrait {
    public function uploadFile($file, $path, $filename, $oldFile = null)
    {
        return $file->move(public_path('images/'.$path),$filename);
        if (! is_null($oldFile)) {
            unlink(public_path($oldFile));
        }
    }
}

