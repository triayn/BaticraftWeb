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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk');
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('harga');
            $table->enum('kategori', ['kain', 'kaos', 'kemeja']);
            $table->integer('stok');
            $table->string('ukuran')->nullable();
            $table->string('bahan')->nullable();
            $table->integer('panjang_kain');
            $table->integer('lebar_kain');
            $table->string('jenis_batik');
            $table->enum('jenis_lengan', ['pendek', 'panjang'])->nullable();
            $table->string('jenis_kerah')->nullable();
            $table->enum('status', ['tersedia', 'tidak tersedia']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
