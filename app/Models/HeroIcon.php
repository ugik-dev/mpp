<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroIcon extends Model
{
    use HasFactory;
    protected $fillable = ['text', 'icon', 'button', 'button_type', 'button_text', 'key', 'link', 'image', 'number'];
}
