<?php
namespace App\Http\Traits;


trait chefTrait {
    private function getChefById($chefId)
    {
        return $this->chefModel::find($chefId);
    }
    private function getChefs()
    {
        return $this->chefModel::get();
    }


}

trait fileTrait {
    private function uploadFile($file,$path,$filename,$oldFile=null)
    {
        return $file->move(public_path('images/'.$path),$filename);
        if(! is_null($oldFile)) {
            unlink(public_path($oldFile));
        }
    }
}
