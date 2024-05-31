<?php

namespace Database\Seeders;

use App\Models\ConfHome;
use App\Models\Hero;
use App\Models\HeroIcon;
use App\Models\LoginSession;
use App\Models\Patner;
use App\Models\Profile;
use App\Models\RequestCall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultLandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Hero::create(['text_1' => 'Selamat Datang di', 'text_2' => 'Mall Pelayanan<br>Publik', 'button' => 'N']);
        // Hero::create(['text_1' => 'Selamat Datang di', 'text_2' => 'Mall Pelayanan<br>Publik', 'button' => 'N']);
        // Hero::create(['text_1' => 'Selamat Datang di', 'text_2' => 'Mall Pelayanan<br>Publik', 'button' => 'N']);
        // Hero::create(['text_1' => 'Selamat Datang di', 'text_2' => 'Mall Pelayanan<br>Publik', 'button' => 'N']);

        HeroIcon::updateOrCreate(['number' => '1', 'text' => 'Pemerintahan', 'icon' => 'flaticon-parthenon', 'link' => 'https://www.bangka.go.id/', 'button' => 'Y', 'button_type' => 'link']);
        HeroIcon::updateOrCreate(['number' => '2', 'text' => 'Bisnis & Industri', 'icon' => 'fa-solid fa-industry', 'link' => 'https://www.bangka.go.id/', 'button' => 'N', 'button_type' => 'link']);
        HeroIcon::updateOrCreate(['number' => '3', 'text' => 'Sosial dan Pemberdayaan', 'icon' => 'flaticon-parthenon', 'link' => 'https://www.bangka.go.id/', 'button' => 'N', 'button_type' => 'link']);
        HeroIcon::updateOrCreate(['number' => '4', 'text' => 'Kesehatan', 'icon' => 'flaticon-parthenon', 'link' => 'https://www.bangka.go.id/', 'button' => 'N', 'button_type' => 'link']);

        ConfHome::create(['id' => 1]);
        Profile::create(['id' => 1]);

        Patner::create(['jenis' => 'Patner', 'name' => 'OSS', 'link' => 'https://oss.go.id/']);
        Patner::create(['jenis' => 'Patner', 'name' => 'Pemerintah Kabupaten Bangka', 'link' => 'https://bangka.go.id/']);
        Patner::create(['jenis' => 'Patner', 'name' => 'DISKOMINFOTIK', 'link' => 'https://bangka.go.id/']);
        Patner::create(['jenis' => 'Patner', 'name' => 'SIMBG PURP', 'link' => 'https://simbg.pu.go.id/']);
        Patner::create(['jenis' => 'Patner', 'name' => 'SPAN LAPOR', 'link' => 'https://lapor.go.id/']);

        Patner::create(['jenis' => 'Banner', 'name' => 'PPID Bangka', 'link' => 'https://ppid-kab.bangka.go.id/']);
    }
}
