<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaMenuUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'status',
        'user_id',
        'menu_id',
    ];
}
