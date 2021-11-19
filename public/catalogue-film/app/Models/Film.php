<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'films';


    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
}
