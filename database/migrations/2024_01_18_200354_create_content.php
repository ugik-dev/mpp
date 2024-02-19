<?php

use App\Models\RefContent;
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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(RefContent::class);
            $table->unsignedBigInteger('ref_content_id')->nullable();
            $table->foreign('ref_content_id')
                ->references('id')
                ->on('ref_contents')
                ->onDelete('cascade');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('content')->nullable();
            $table->string('sampul')->nullable();
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content');
    }
};
