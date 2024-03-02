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
        Schema::create('bank_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('agency_id')->nullable();
            $table->foreign('agency_id')
                ->references('id')
                ->on('agencies')
                ->onDelete('cascade');
            $table->unsignedBigInteger('ref_id')->nullable();
            $table->foreign('ref_id')
                ->references('id')
                ->on('ref_bank_data')
                ->onDelete('cascade');
            $table->string('name');
            $table->enum('public', ['Y', 'N'])->default('Y');
            $table->string('fileextension')->nullable();
            $table->string('description');
            $table->integer('view')->default(0);
            $table->string('slug')->unique();
            $table->date('tanggal_dokumen')->nullable()->default(now());
            $table->string('filename')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_datas');
    }
};
