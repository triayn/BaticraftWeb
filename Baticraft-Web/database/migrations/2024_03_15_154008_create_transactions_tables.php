<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->unsignedBigInteger('user_id');
            $table->enum('jenis_transaksi', ['pesan', 'langsung']);
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->string('metode_pembayaran');
            $table->string('catatan_customer')->nullable();
            $table->enum('status_transaksi', ['diproses', 'ditolak', 'selesai']);
            $table->string('catatan_admin')->nullable();
            $table->date('tanggal');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('produk_id');
            $table->string('nama_produk', 50);
            $table->integer('jumlah_barang');
            $table->integer('harga_total');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('transaksi_id')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('detail_transactions');
    }
}
