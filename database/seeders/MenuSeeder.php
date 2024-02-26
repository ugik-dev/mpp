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

        $id = Menu::updateOrCreate(['jenis' => 'N',  'slug' => 'tentang', 'name' => 'Tentang Kami', 'deletable' => 'N', 'editable' => 'Y'])->id;
        Menu::updateOrCreate(['jenis' => 'page',  'slug' => 'moto', 'name' => 'Moto', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'page',  'slug' => 'sambutan', 'name' => 'Sambutan Kepala Dinas', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'page',  'slug' => 'visi-misi', 'name' => 'Visi dan Misi', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'page',  'slug' => 'slogan', 'name' => 'Slogan', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'N']);
        Menu::updateOrCreate(['jenis' => 'page',  'slug' => 'fakta-integritas', 'name' => 'Fakta Integritas', 'parent_id' => $id, 'deletable' => 'Y', 'editable' => 'N']);

        $id = Menu::updateOrCreate(['jenis' => 'route', 'slug' => 'layanan',  'name' => 'Layanan', 'deletable' => 'N', 'editable' => 'N'])->id;
        Menu::updateOrCreate(['jenis' => 'url', 'slug' => 'mpp',  'name' => 'MPP', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'url', 'slug' => 'dinas-pmp2kukm', 'name' => 'Dinas PMP2KUKM', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        $id_dks = Menu::updateOrCreate(['jenis' => 'page', 'slug' => 'dinas-kesehatan', 'name' => 'Dinas Kesehatan', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y'])->id;
        Menu::updateOrCreate(['jenis' => 'url', 'slug' => 'dinas-sosial', 'name' => 'Dinas Sosial', 'parent_id' => $id, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'link', 'slug' => 'website', 'key' => 'http://dinkes.bangka.go.id', 'name' => 'Website', 'parent_id' => $id_dks, 'deletable' => 'Y', 'editable' => 'Y']);
        Menu::updateOrCreate(['jenis' => 'page', 'slug' => 'bpjs-baru', 'name' => 'BPJS Baru', 'parent_id' => $id_dks, 'deletable' => 'Y', 'editable' => 'Y']);

        Menu::updateOrCreate(['jenis' => 'N', 'slug' => 'bank-data', 'name' => 'Bank Data', 'deletable' => 'N', 'editable' => 'N']);
        Menu::updateOrCreate(['jenis' => 'N', 'slug' => 'pengaduan', 'name' => 'Pengaduan', 'deletable' => 'N', 'editable' => 'N']);
        Menu::updateOrCreate(['jenis' => 'N', 'slug' => 'informasi', 'name' => 'Informasi', 'deletable' => 'N', 'editable' => 'N']);
    }
}
