<?php
namespace App\Http\Traits;

Trait CategoryTrait {
    private function getCategoryById($categoryId)
    {
        return $this->categoryModel::find($categoryId);
    }
}

