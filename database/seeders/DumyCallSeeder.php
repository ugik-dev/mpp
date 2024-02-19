<?php

namespace Database\Seeders;

use App\Models\LoginSession;
use App\Models\RequestCall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DumyCallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sqlFilePath = database_path('seeders/sql/contents.sql');
        if (file_exists($sqlFilePath)) {
            $sqlContent = file_get_contents($sqlFilePath);
            DB::unprepared($sqlContent);
        } else {
            echo "SQL file not found at $sqlFilePath\n";
        }
    }
}
