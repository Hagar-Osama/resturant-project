<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function menus() 
    {
        return $this->hasMany(Menu::class, 'category_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
