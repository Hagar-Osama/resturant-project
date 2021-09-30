<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price','description', 'category_id'];

    public function category() 
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
