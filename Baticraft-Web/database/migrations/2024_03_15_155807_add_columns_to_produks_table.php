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
        Schema::table('produks', function (Blueprint $table) {
            $table->string('kode_produk')->after('id');
            $table->integer('panjang_kain')->after('ukuran');
            $table->integer('lebar_kain')->after('panjang_kain');
            $table->string('jenis_batik')->after('lebar_kain');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('kode_produk');
            $table->dropColumn('panjang_kain');
            $table->dropColumn('lebar_kain');
            $table->dropColumn('jenis_batik');
        });
    }
};
