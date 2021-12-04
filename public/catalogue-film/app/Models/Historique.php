<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    // public $timestamps = false;

    protected $guarded = [];
    protected $table = 'visionnages';

    public function media()
    {
        return $this->hasOne('App\Models\Media', 'id', 'media_id');
    }
}
