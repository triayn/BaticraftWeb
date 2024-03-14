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
            $table->enum('kategori', ['kain', 'kaos', 'kemeja'])->after('harga');
            $table->enum('status', ['tersedia', 'tidak tersedia'])->after('jenis_kerah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            $table->dropColumn('kategori');
            $table->dropColumn('status');
        });
    }
};
