<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeeder::class);
        // $this->call(ReferanceSeeder::class);
        $this->call(UsersSeeder::class);
        // $this->call(LiveLocationSeeder::class);
        // $this->call(DumyCallSeeder::class);
    }
}
