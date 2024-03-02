<?php

namespace Database\Seeders;

use App\Models\Hero;
use App\Models\HeroIcon;
use App\Models\LoginSession;
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
        Hero::create(['text_1' => 'Selamat Datang di', 'text_2' => 'Mall Pelayanan<br>Publik', 'button' => 'N']);
        Hero::create(['text_1' => 'Selamat Datang di', 'text_2' => 'Mall Pelayanan<br>Publik', 'button' => 'N']);
        Hero::create(['text_1' => 'Selamat Datang di', 'text_2' => 'Mall Pelayanan<br>Publik', 'button' => 'N']);

        HeroIcon::updateOrCreate(['number' => '1', 'text' => 'Pemerintahan', 'icon' => 'flaticon-parthenon', 'link' => 'https://www.bangka.go.id/', 'button' => 'Y', 'button_type' => 'link']);
        HeroIcon::updateOrCreate(['number' => '2', 'text' => 'Bisnis & Industri', 'icon' => 'fa-solid fa-industry', 'link' => 'https://www.bangka.go.id/', 'button' => 'N', 'button_type' => 'link']);
        HeroIcon::updateOrCreate(['number' => '3', 'text' => 'Sosial dan Pemberdayaan', 'icon' => 'flaticon-parthenon', 'link' => 'https://www.bangka.go.id/', 'button' => 'N', 'button_type' => 'link']);
        HeroIcon::updateOrCreate(['number' => '4', 'text' => 'Kesehatan', 'icon' => 'flaticon-parthenon', 'link' => 'https://www.bangka.go.id/', 'button' => 'N', 'button_type' => 'link']);
    }
}
