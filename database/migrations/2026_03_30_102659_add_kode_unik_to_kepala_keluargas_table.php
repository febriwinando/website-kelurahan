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
    Schema::table('kepala_keluargas', function (Blueprint $table) {
        $table->string('kode_unik')->unique()->nullable()->after('nik');
    });
}

public function down()
{
    Schema::table('kepala_keluargas', function (Blueprint $table) {
        $table->dropColumn('kode_unik');
    });
}
};
