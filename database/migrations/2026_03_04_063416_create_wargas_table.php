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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('dasa_wisma')->nullable();
            $table->string('nama_kepala_keluarga')->nullable();
            $table->string('no_registrasi')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->string('jabatan')->nullable();
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('status_dalam_keluarga')->nullable();
            $table->string('agama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->boolean('akseptor_kb')->default(0);
            $table->boolean('aktif_posyandu')->default(0);
            $table->boolean('ikut_bkb')->default(0);
            $table->boolean('memiliki_tabungan')->default(0);
            $table->boolean('ikut_kelompok_belajar')->default(0);
            $table->string('jenis_kelompok_belajar')->nullable();
            $table->boolean('ikut_paud')->default(0);
            $table->boolean('ikut_koperasi')->default(0);
            $table->string('jenis_koperasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
