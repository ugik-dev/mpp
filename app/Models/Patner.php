<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patner extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'jenis', 'number', 'link', 'image', 'description', 'bg_color'];
}
