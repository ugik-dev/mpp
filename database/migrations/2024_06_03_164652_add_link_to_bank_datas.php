<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bank_data', function (Blueprint $table) {
            $table->string('link')->nullable();
            $table->enum('metode', ['upload', 'link'])->default('upload');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bank_data', function (Blueprint $table) {
            //
        });
    }
};
