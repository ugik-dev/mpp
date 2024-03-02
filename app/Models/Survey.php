<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'respon',
        'alasan',
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
        'kesesuaian',
        'kemudahan',
        'kecepatan',
        'tarif',
        'sop',
        'kompetensi',
        'prilaku',
        'sarpras',
        'pengaduan',
    ];
}
