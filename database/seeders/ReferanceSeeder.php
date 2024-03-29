<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\RefBankData;
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
        RefContent::updateOrCreate(['name' => 'Informasi', 'prefix' => 'informasi']);
        RefContent::updateOrCreate(['name' => 'Berita', 'prefix' => 'berita']);
        RefContent::updateOrCreate(['name' => 'Pengumuman', 'prefix' => 'pengumuman']);
        RefContent::updateOrCreate(['name' => 'Artikel', 'prefix' => 'artikel']);
        RefContent::updateOrCreate(['name' => 'Event', 'prefix' => 'artikel']);

        RefBankData::updateOrCreate(['id' => 1, 'name' => 'SOP']);
        RefBankData::updateOrCreate(['id' => 2, 'name' => 'SK']);
        RefBankData::updateOrCreate(['id' => 3, 'name' => 'Produk Hukum (PERDA, PERBUB dan lainnya)']);
        RefBankData::updateOrCreate(['id' => 99, 'name' => 'Lainya']);
    }
}
