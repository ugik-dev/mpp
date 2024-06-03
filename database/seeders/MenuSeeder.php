<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\Menu;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create(['id' => 1, 'number' => 1, 'jenis' => 'route', 'slug' => 'home', 'name' => 'Home', 'deletable' => 'N', 'editable' => 'N']);
        Menu::create(['id' => 3, 'number' => 99, 'jenis' => 'route', 'slug' => 'contact', 'name' => 'Kontak', 'deletable' => 'N', 'editable' => 'N']);
        $id_tentang = Menu::create(['id' => 2, 'number' => 2, 'jenis' => 'N',  'slug' => 'tentang', 'name' => 'Tentang Kami', 'deletable' => 'N', 'editable' => 'Y'])->id;
        $id_layanan = Menu::create(['id' => 8, 'number' => 3, 'jenis' => 'N', 'slug' => 'layanan',  'name' => 'Layanan', 'deletable' => 'N', 'editable' => 'N'])->id;
        $id_informasi =     Menu::create(['id' => 17, 'number' => 4, 'jenis' => 'N', 'slug' => 'informasi', 'name' => 'Informasi', 'deletable' => 'N', 'editable' => 'N'])->id;
        Menu::create(['id' => 4, 'number' => 9, 'jenis' => 'route', 'slug' => 'bank-data', 'name' => 'Bank Data', 'deletable' => 'N', 'editable' => 'N']);
        Menu::create(['jenis' => 'route', 'parent_id' => $id_informasi, 'slug' => 'survey', 'name' => 'e-Survey SKM', 'deletable' => 'N', 'editable' => 'N']);
        Menu::create(['jenis' => 'route', 'parent_id' => $id_informasi, 'slug' => 'survey-kpk', 'name' => 'e-Survey KPK', 'deletable' => 'N', 'editable' => 'N']);
        Menu::create(['jenis' => 'route', 'parent_id' => $id_informasi, 'slug' => 'pengaduan', 'name' => 'e-Pengaduan', 'deletable' => 'N', 'editable' => 'N']);
        Menu::create(['jenis' => 'page',  'slug' => 'moto', 'name' => 'Moto', 'parent_id' => $id_tentang, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::create(['jenis' => 'page',  'slug' => 'sambutan', 'name' => 'Sambutan Kepala Dinas', 'parent_id' => $id_tentang, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::create(['jenis' => 'page',  'slug' => 'visi-misi', 'name' => 'Visi dan Misi', 'parent_id' => $id_tentang, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::create(['jenis' => 'page',  'slug' => 'slogan', 'name' => 'Slogan', 'parent_id' => $id_tentang, 'deletable' => 'N', 'editable' => 'N']);
        Menu::create(['jenis' => 'page',  'slug' => 'fakta-integritas', 'name' => 'Fakta Integritas', 'parent_id' => $id_tentang, 'deletable' => 'Y', 'editable' => 'N']);
        $id_ptsp = Menu::create(['jenis' => 'page', 'slug' => 'dinpmp2kukm',  'name' => 'DINPMP2KUKM', 'parent_id' => $id_layanan, 'deletable' => 'N', 'editable' => 'Y'])->id;
        Menu::create(['jenis' => 'page', 'slug' => 'oss',  'name' => 'OSS', 'parent_id' => $id_ptsp, 'deletable' => 'N', 'editable' => 'Y']);
        Agency::create([
            'name' => 'Dinas Penanaman Modal, Pelayanan Perizinan Satu Pintu, Koperasi, Usaha Kecil dan Menengah',
            'name_sort' => 'PMP2KUKM',
            'website' => 'https://dinpmp2kukm.bangka.go.id/',
            'menu_id' => $id_ptsp,
            'phone' => '0717 96107',
            'whatsapp' => '08127123225',
            'email' => 'dinpmp2kukm@gmail.com',
            'alamat' => 'Jalan Pemuda Sungailiat 33215',
        ]);
        $id_dks = Menu::create(['jenis' => 'page', 'slug' => 'dinkes',  'name' => 'Dinas Kesehatan', 'parent_id' => $id_layanan, 'deletable' => 'N', 'editable' => 'Y'])->id;
        Menu::create(['jenis' => 'page', 'slug' => 'bpjs-baru',  'name' => 'BPJS Baru', 'parent_id' => $id_dks, 'deletable' => 'N', 'editable' => 'Y']);
        Menu::create(['jenis' => 'page', 'slug' => 'bpjs-migrasi',  'name' => 'BPJS Migrasi', 'parent_id' => $id_dks, 'deletable' => 'N', 'editable' => 'Y']);
        Agency::create([
            'name' => 'Dinas Kesehatan',
            'name_sort' => 'Dinas Kesehatan',
            'website' => 'https://dinkes.bangka.go.id/',
            'menu_id' => $id_dks,
            // 'phone' => '0717 96107',
            // 'whatsapp' => '08127123225',
            'email' => 'dinkes.bangka@gmail.com',
            'alamat' => 'Jl A Yani, Jalur Dua Sungailiat 33215',
        ]);
        $id_dinsos = Menu::create(['jenis' => 'page', 'slug' => 'dinsos',  'name' => 'Dinas Sosial', 'parent_id' => $id_layanan, 'deletable' => 'N', 'editable' => 'Y'])->id;
        Agency::create([
            'name' => 'Dinas Sosial',
            'name_sort' => 'Dinas Sosial',
            'website' => 'https://dinsos.bangka.go.id/',
            'menu_id' => $id_dinsos,
        ]);
    }
}
