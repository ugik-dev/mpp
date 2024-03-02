<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Content;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        // $faker = Faker\Factory::create('fa_IR');

        $tanggal_awal = "2023-01-01";
        $tanggal_akhir = "2024-03-04";
        $timestamp_awal = strtotime($tanggal_awal);
        $timestamp_akhir = strtotime($tanggal_akhir);

        $timestamp_acak = mt_rand($timestamp_awal, $timestamp_akhir);
        $tanggal_acak = date("Y-m-d", $timestamp_acak);
        $judul = $this->faker->sentence;
        $slug = Str::slug($judul);

        return
            [
                'agency_id' => rand(1, 3),
                'tanggal' => $tanggal_acak,
                'user_id' => rand(1, 4),
                'ref_content_id' => rand(1, 4),
                'judul' => $judul,
                'content' => fake('id_ID')->paragraphs(20, true),
                'slug' => $slug
            ];
    }
}
