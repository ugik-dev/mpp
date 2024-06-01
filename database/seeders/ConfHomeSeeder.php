<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conf_homes')->insert([
            'sec_2_sidebar' => json_encode([
                [
                    'label' => 'Data Perizinan',
                    'link' => '#'
                ],
                [
                    'label' => 'Standar Kepuasan Masyarakat',
                    'link' => null
                ],
                [
                    'label' => 'Portal Kabupaten',
                    'link' => 'https://bangka.go.id'
                ]
            ]),
            'sec_3_data' => json_encode([
                [
                    'icon' => 'flaticon-running-man',
                    'value' => '39',
                    'satuan' => 'rb',
                    'desc' => 'Total Masyarakat'
                ],
                [
                    'icon' => 'flaticon-coverage',
                    'value' => '33',
                    'satuan' => 'km',
                    'desc' => 'Cakupan Area'
                ],
                [
                    'icon' => 'flaticon-landscape',
                    'value' => '100',
                    'satuan' => '%',
                    'desc' => 'Legalitas'
                ],
                [
                    'icon' => 'flaticon-barn-3',
                    'value' => '100',
                    'satuan' => '%',
                    'desc' => 'Gratis Biaya'
                ]
            ]),
            'sec_4_list' => json_encode(['poin 1', 'poin 2', 'poin 3'])
        ]);
    }
}
