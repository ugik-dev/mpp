<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = Role::updateOrCreate(['id' => 1, 'name' => 'super', 'title' => 'Super Admin']);
        $admin = Role::updateOrCreate(['id' => 7, 'name' => 'admin', 'title' => 'Admin']);
        $kepala = Role::updateOrCreate(['id' => 2, 'name' => 'kepala', 'title' => 'Kepala UPT']);
        $kasubag = Role::updateOrCreate(['id' => 3, 'name' => 'kasubag', 'title' => 'Kasubag']);
        $kabid = Role::updateOrCreate(['id' => 4, 'name' => 'kabid', 'title' => 'Kepala Bidang']);
        $kasi = Role::updateOrCreate(['id' => 5, 'name' => 'kasi', 'title' => 'Kepala Seksi']);
        $pegawai = Role::updateOrCreate(['id' => 6, 'name' => 'pegawai', 'title' => 'Pegawai']);

        $respon_call = Permission::updateOrCreate(['name' => 'respon_call']);
        $crud_users = Permission::updateOrCreate(['name' => 'crud_users']);
        $crud_information = Permission::updateOrCreate(['name' => 'crud_information']);
        $super_admin->givePermissionTo([$respon_call, $crud_users, $crud_information]);
        // $super_admin->givePermissionTo($crud_users);
        // $super_admin->givePermissionTo($crud_information);

        // $super_admin->assignRole(1);
    }
}
