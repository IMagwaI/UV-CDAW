<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $guarded = [];
    protected $table = 'favoris';

    public function media()
    {
        return $this->hasOne('App\Models\Media', 'id', 'media_id');
    }
}
