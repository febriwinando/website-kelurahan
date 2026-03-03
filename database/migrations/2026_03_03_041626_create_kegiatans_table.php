<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kegiatan_pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kegiatan_id')
                ->constrained('kegiatans')
                ->onDelete('cascade');

            $table->string('nama');
            $table->string('jabatan')->nullable();
            $table->string('tanda_tangan')->nullable(); // bisa path file atau base64

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
