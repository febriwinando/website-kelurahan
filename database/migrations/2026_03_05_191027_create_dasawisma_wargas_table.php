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
        Schema::create('dasawisma_wargas', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk')->unique();; // relasi ke tabel warga
            // Identitas
            $table->string('nama_keluarga')->nullable();
            $table->string('rw')->nullable();
            $table->string('rt')->nullable();
            $table->string('dasa_wisma')->nullable();
            $table->integer('jumlah_kk')->nullable();

            // Jumlah anggota keluarga
            $table->integer('jumlah_seluruhnya')->default(0);
            $table->integer('balita_l')->default(0);
            $table->integer('balita_p')->default(0);
            $table->integer('pus')->default(0);
            $table->integer('wus')->default(0);
            $table->integer('ibu_hamil')->default(0);
            $table->integer('ibu_menyusui')->default(0);
            $table->integer('lansia')->default(0);
            $table->integer('buta_l')->default(0);
            $table->integer('buta_p')->default(0);

            // Kriteria rumah
            $table->integer('rumah_sehat')->default(0);
            $table->integer('rumah_tidak_sehat')->default(0);
            $table->boolean('memiliki_tempat_sampah')->default(false);
            $table->boolean('memiliki_spal')->default(false);
            $table->boolean('memiliki_stiker_p4k')->default(false);

            // Sumber air keluarga
            $table->boolean('air_pdam')->default(false);
            $table->boolean('air_sumur')->default(false);
            $table->boolean('air_sungai')->default(false);
            $table->boolean('air_lainnya')->default(false);

            // Jamban
            $table->integer('jumlah_jamban_keluarga')->default(0);

            // Makanan pokok
            $table->integer('beras')->default(0);
            $table->integer('non_beras')->default(0);

            // Kegiatan warga
            $table->boolean('up2k')->default(false);
            $table->boolean('pemanfaatan_tanaman_pekarangan')->default(false);
            $table->boolean('industri_rumah_tangga')->default(false);
            $table->boolean('kesehatan_lingkungan')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dasawisma_wargas');
    }
};
