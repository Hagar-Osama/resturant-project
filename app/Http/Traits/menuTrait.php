<?php
namespace App\Http\Traits;

trait menuTrait {

    public function getMenuById($menuId)
    {
        return $this->menuModel::find($menuId);
    }

    private function getMenus()
    {
        return $this->menuModel::get();
    }

}
