<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\Album;
use App\Models\Content;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Pengaduan;
use App\Models\Survey;
use App\Models\SurveyKPK;
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

        for ($i = 1; $i <= 100; $i++) {
            $timestamp_acak = mt_rand($timestamp_awal, $timestamp_akhir);
            $tanggal_acak = date("Y-m-d", $timestamp_acak);
            $judul = $faker->unique()->realTextBetween(10, 30, 5);
            $slug = Str::slug($judul);
            Content::updateOrCreate(['agency_id' => rand(1, 3), 'tanggal' => $tanggal_acak, 'user_id' => rand(1, 4), 'ref_content_id' => rand(1, 5), 'judul' => $judul, 'content' => $faker->realTextBetween(30, 400, 5), 'slug' => $slug]);
        }

        for ($i = 1; $i <= 100; $i++) {
            $judul = $faker->unique()->realTextBetween(10, 30, 5);
            Survey::updateOrCreate([
                'nama' => $faker->name(), 'alasan' => $judul, 'respon' => rand(0, 5),
                'alamat' => $faker->streetAddress(), 'email' => $faker->email(), 'no_hp' => $faker->phoneNumber(), 'layanan' => rand(1, 3)
            ]);
            SurveyKPK::updateOrCreate([
                'nama' => $faker->name(),
                'alamat' => $faker->streetAddress(), 'email' => $faker->email(), 'no_hp' => $faker->phoneNumber(), 'layanan' => rand(1, 3)
            ]);
            Pengaduan::updateOrCreate([
                'nama' => $faker->name(),
                'message' => $faker->realTextBetween(10, 30, 5),
                'sensor_indentitas' => rand(0, 1) ? 'N' : 'Y',
                'alamat' => $faker->streetAddress(), 'email' => $faker->email(), 'no_hp' => $faker->phoneNumber(), 'layanan' => rand(1, 3)
            ]);
        }
        // 'name', 'image', 'description', 'number'
        for ($i = 1; $i <= 5; $i++) {
            $judul = $faker->unique()->realTextBetween(10, 30, 3);
            $desc = $faker->unique()->realTextBetween(10, 30, 3);
            Album::updateOrCreate([
                'name' => $judul,
                'image' => null,
                'description' => $desc,
                'number' => $i,
            ]);
        }
        // ['name', 'album_id', 'jenis', 'link', 'image', 'description', 'number'];
        for ($i = 1; $i <= 100; $i++) {
            $judul = $faker->unique()->realTextBetween(10, 30, 3);
            $desc = $faker->unique()->realTextBetween(10, 30, 3);
            Gallery::updateOrCreate([
                'name' => $judul,
                'image' => null,
                'description' => $desc,
                'album_id' => rand(1, 5),
                'number' => $i,
            ]);
        }
    }
}
