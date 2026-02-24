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
        Schema::create('notulens', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal');
            $table->time('waktu');
            $table->string('tempat');
            $table->string('macam')->nullable();

            $table->string('pimpinan_rapat')->nullable();
            $table->integer('jumlah_diundang')->nullable();
            $table->integer('jumlah_hadir')->nullable();
            $table->integer('jumlah_tidak_hadir')->nullable();

            $table->text('susunan_acara')->nullable();
            $table->text('keputusan')->nullable();
            $table->text('lain_lain')->nullable();
            $table->text('penutup')->nullable();

            $table->date('tanggal_disahkan')->nullable();
            $table->string('tempat_disahkan')->nullable();
            $table->json('foto_dokumentasi')->nullable();
            // user tracking
            $table->unsignedBigInteger('dibuat_oleh')->nullable();
            $table->unsignedBigInteger('diubah_oleh')->nullable();

            $table->timestamps();

            // relasi ke users
            $table->foreign('dibuat_oleh')->references('id')->on('users')->nullOnDelete();
            $table->foreign('diubah_oleh')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notulens');
    }
};
