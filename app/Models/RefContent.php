<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefContent extends Model
{
    use HasFactory;
    // protected $fillable = ['judul', 'slug', 'content', 'tanggal', 'ref_content_id', 'sampul', 'user_id', 'agency_id'];

    public function postingan()
    {
        return $this->hasMany(Content::class, 'ref_content_id');
    }
}
