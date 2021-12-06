<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'medias';

 
/*     public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    } */

    
 /*    public function comment()
    {
        return $this->hasMany(Comment::class);
    }  */
}
