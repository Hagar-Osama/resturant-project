<?php
namespace App\Http\Traits;

trait InfoTrait {
    private function getInfoById($infoId)
    {
        return $this->infoModel::find($infoId);
    }
    private function getInfo()
    {
        return $this->infoModel::get()->groupBy('key');
    }
}
