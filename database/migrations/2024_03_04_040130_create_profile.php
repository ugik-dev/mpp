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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('address')->default("Jl. Jendral Sudirman, Ex. Puskesmas Sungailiat,<br> Kabupaten Bangka (33211),<br> Provinsi Kepulauan Bangka Belitung - Indonesia");
            $table->string('telephone')->default('07170000')->nullable();
            $table->string('whatsapp')->default('081279748967')->nullable();
            $table->string('email')->default('dinpmp2kukm@gmail.com');
            $table->string('facebook')->default('https://www.facebook.com/dinpmp2kukmbangka/')->nullable();
            $table->string('instagram')->default('https://www.instagram.com/ptsp_bangka/')->nullable();
            $table->string('pinterest')->default('https://id.pinterest.com/dinpmp2kukm/')->nullable();
            $table->string('twitter')->nullable();
            $table->string('operational_time')->default("Senin - Jumat | 08.30 - 15.30");
            $table->string('description_footer')->default('Selamat Datang');
            $table->string('lng')->default('');
            $table->string('lat')->default('Selamat Datang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile');
    }
};
