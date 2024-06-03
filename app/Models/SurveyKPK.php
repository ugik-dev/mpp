<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyKPK extends Model
{
    use HasFactory;
    protected $table = 'survey_kpk';
    protected $fillable = [
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
        'prosedur',
        'persyaratan',
        'waktu',
        'jam',
        'petugas',
        'aplikasi',
        'fasilitas',
        'tidak_menerima',
        'tidak_meminta',
        'tidak_menawarkan',
        'tidak_pungli',
        'tidak_percaloan',
        'tidak_deskriminasi',
    ];
}
