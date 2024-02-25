<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $fillable = ['text_1', 'text_2', 'button', 'button_type', 'button_text', 'key', 'link', 'image', 'number'];
}
