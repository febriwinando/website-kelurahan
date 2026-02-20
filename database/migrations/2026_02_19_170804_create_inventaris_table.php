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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('diterima_dari')->nullable();
            $table->date('tanggal_penerimaan')->nullable();
            $table->integer('jumlah')->default(1);
            $table->string('tempat_penyimpanan')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status', [
                'Tersedia',
                'Dipinjam',
                'Perbaikan',
                'Dihapus'
            ])->default('Tersedia');

            
            $table->enum('kondisi', [
                'Baik',
                'Kurang Baik',
                'Rusak Ringan',
                'Rusak Berat'
            ])->default('baik');
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('foto_inventaris')->nullable();

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
