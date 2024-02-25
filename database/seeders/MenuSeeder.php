<?php

namespace Database\Seeders;

use App\Models\Menu;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::updateOrCreate(['jenis' => 'route', 'slug' => 'home', 'name' => 'Home', 'deletable' => 'N', 'editable' => 'N']);

        $id = Menu::updateOrCreate(['jenis' => 'route',  'slug' => 'tentang', 'name' => 'Tentang Kami', 'deletable' => 'N', 'editable' => 'Y'])->id;
        Menu::updateOrCreate(['jenis' => 'route',  'slug' => 'moto', 'name' => 'Moto', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'route',  'slug' => 'sambutan', 'name' => 'Sambutan Kepala Dinas', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'route',  'slug' => 'visi-misi', 'name' => 'Visi dan Misi', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'route',  'slug' => 'slogan', 'name' => 'Slogan', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'N']);
        Menu::updateOrCreate(['jenis' => 'route',  'slug' => 'fakta-integritas', 'name' => 'Fakta Integritas', 'parent_id' => $id, 'deletable' => 'Y', 'editable' => 'N']);


        $id = Menu::updateOrCreate(['jenis' => 'route', 'slug' => 'jenis-layanan',  'name' => 'Jenis Layanan', 'deletable' => 'N', 'editable' => 'Y'])->id;
        Menu::updateOrCreate(['jenis' => 'route', 'slug' => 'mpp',  'name' => 'MPP', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'route', 'slug' => 'dinas-pmp2kukm', 'name' => 'Dinas PMP2KUKM', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'route', 'slug' => 'dinas-kesehatan', 'name' => 'Dinas Kesehatan', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'route', 'slug' => 'dinas-sosial', 'name' => 'Dinas Sosial', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
    }
}
