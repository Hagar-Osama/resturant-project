<?php
namespace App\Http\Traits;


trait chefTrait {
    private function getChefById($chefId)
    {
        return $this->chefModel::find($chefId);
    }


}

trait fileTrait {
    private function uploadFile($file,$path,$filename)
    {
        return $file->move(public_path('images/'.$path),$filename);
    }
}
