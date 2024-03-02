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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_id')->nullable();
            $table->foreign('content_id')
                ->references('id')
                ->on('contents')
                ->onDelete('cascade');
            $table->unsignedBigInteger('reply_id')->nullable();
            $table->foreign('reply_id')
                ->references('id')
                ->on('comments')
                ->onDelete('cascade');
            $table->string('name');
            $table->integer('star')->nullable();
            $table->string('email')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('phone')->nullable();
            $table->string('message');
            $table->enum('show', ['Y', 'N'])->default('Y');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
