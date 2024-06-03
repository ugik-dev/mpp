<?php

namespace Database\Seeders;

use App\Models\Agency;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pwd = Hash::make('123');
        $admin = User::updateOrCreate(
            [
                'username' => 'super',
                'name' => 'Super Admin',
                'email' => 'super.admin@gmail.com',
                'password' => $pwd,
                'role_id' => 1
            ],
        );

        $role = Role::findOrFail(1);
        $admin->assignRole($role);

        $instansi = Agency::with('menuparent')->get();
        $r_admin = Role::findOrFail(7);
        foreach ($instansi as $i) {
            $user = User::updateOrCreate(
                [
                    'username' => 'admin' . $i->menuparent->slug,
                    'name' => 'Admin ' . $i->name_sort,
                    'agency_id' =>  $i->id,
                    'email' => strtolower($i->name_sort) . '@mail.com',
                    'password' => $pwd,
                    'role_id' => 7
                ],
            );
            $user->assignRole($r_admin);
        }
    }
}
