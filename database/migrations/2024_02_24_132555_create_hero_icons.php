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
        Schema::create('hero_icons', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->default(99);
            $table->string('text')->nullable();
            $table->string('icon')->nullable();
            $table->enum('button', ['Y', 'N'])->default('Y');
            $table->enum('button_type', ['link', 'page', 'content'])->nullable();
            $table->string('button_text')->nullable();
            $table->string('key')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_icons');
    }
};
