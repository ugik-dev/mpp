<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\Content;
use App\Models\Menu;
use Faker\Factory as Faker;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $tanggal_awal = "2023-01-01";
        $tanggal_akhir = "2024-03-04";
        $timestamp_awal = strtotime($tanggal_awal);
        $timestamp_akhir = strtotime($tanggal_akhir);

        // Menghasilkan timestamp acak dalam rentang tanggal tertentu
        for ($i = 1; $i <= 100; $i++) {
            $timestamp_acak = mt_rand($timestamp_awal, $timestamp_akhir);
            $tanggal_acak = date("Y-m-d", $timestamp_acak);
            $judul = $faker->sentence;
            $slug = Str::slug($judul);
            Content::updateOrCreate(['agency_id' => rand(1, 3), 'tanggal' => $tanggal_acak, 'user_id' => rand(1, 4), 'ref_content_id' => rand(1, 4), 'judul' => $judul, 'content' => $faker->paragraphs(20, true), 'slug' => $slug]);
        }
    }
}
