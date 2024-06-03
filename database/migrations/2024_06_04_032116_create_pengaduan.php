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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->enum('sensor_indentitas', ['N', 'Y']);
            $table->string('ip_address', 20)->nullable();
            $table->string('nama', 225);
            $table->string('alamat', 225)->nullable();
            $table->string('no_hp', 35)->nullable();
            $table->string('email', 225)->nullable();
            $table->integer('show_survey')->default(1);
            $table->integer('umur')->nullable();
            $table->char('jk', 1)->nullable();
            $table->string('pendidikan', 32)->nullable();
            $table->string('pekerjaan', 64)->nullable();
            $table->string('layanan', 64)->nullable();
            $table->string('message', 225);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
