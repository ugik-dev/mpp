<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'album_id', 'jenis', 'link', 'image', 'description', 'number'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
