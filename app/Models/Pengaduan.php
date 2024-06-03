<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $fillable = [
        'sensor_indentitas',
        'ip_address',
        'nama',
        'alamat',
        'no_hp',
        'email',
        'show_survey',
        'umur',
        'jk',
        'pendidikan',
        'pekerjaan',
        'layanan',
        'message'
    ];
}
