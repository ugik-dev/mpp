<?php

namespace Database\Seeders;

use App\Models\RefContent;
use App\Models\RefJenFaskes;
use App\Models\RefLiveLocation;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RefEmergency;

class ReferanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        RefContent::updateOrCreate(['name' => 'Informasi']);
        RefContent::updateOrCreate(['name' => 'Berita']);
        RefContent::updateOrCreate(['name' => 'Pengumuman']);
        RefContent::updateOrCreate(['name' => 'Artikel']);
    }
}
