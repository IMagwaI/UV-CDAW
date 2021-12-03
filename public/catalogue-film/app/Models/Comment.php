<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'commentaires';
    
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id','user_id');
    }

    public function media()
    {
        return $this->belongsTo(Media::class,'media_id', 'id');
    }
}
