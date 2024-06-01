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
        Schema::create('conf_homes', function (Blueprint $table) {
            $table->id();
            $table->string('sec_2_title')->default('Pelayanan');
            $table->string('sec_2_sub_title')->default('Ketahui kami lebih banyak lagi.');
            $table->string('sec_2_description')->default('');
            $table->string('sec_2_video')->default('https://www.youtube.com/watch?v=J_77mw4IMHk');
            $table->json('sec_2_sidebar')->nullable();
            $table->string('sec_2_sidebar_background')->nullable();
            $table->string('sec_2_button')->default('https://www.youtube.com/watch?v=J_77mw4IMHk');

            $table->enum('sec_3', ['Y', 'N'])->default('Y');
            $table->json('sec_3_data')->nullable();

            $table->enum('sec_4', ['Y', 'N'])->default('Y');
            $table->string('sec_4_title')->default('Sambutan');
            $table->string('sec_4_sub_title')->default('Kepala Dinas');
            $table->string('sec_4_name')->default('Dian Firnandy, SE');
            $table->string('sec_4_description')->default('Segala puji syukur atas Kehadiran Allah Swt. atas rahmat dan karunia-Nya lah kita dapat melaksana kegiatan sebagaimana mestinya..');
            $table->json('sec_4_list')->nullable();
            $table->string('sec_4_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conf_homes');
    }
};
