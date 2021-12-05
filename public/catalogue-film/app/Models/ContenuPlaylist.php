<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenuPlaylist extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];
    protected $table = 'contenu_playlist';

    public function media()
    {
        return $this->hasMany('App\Models\Media', 'id', 'media_id');
    }
}
