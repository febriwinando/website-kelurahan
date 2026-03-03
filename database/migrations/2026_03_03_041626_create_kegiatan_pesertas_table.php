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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('uraian_kegiatan');
            $table->enum('status', ['terverifikasi', 'belum diverifikasi', 'verifikasi ditolak'])->default('belum diverifikasi');
            $table->foreignId('diverifikasi_oleh')->nullable();
            $table->date('tanggal_verifikasi')->nullable();;
            $table->string('kode_verifikasi')->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_pesertas');
    }
};
