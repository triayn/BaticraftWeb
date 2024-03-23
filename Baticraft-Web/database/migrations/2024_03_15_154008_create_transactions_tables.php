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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('kasir');
            $table->enum('jenis_transaksi', ['pesan', 'langsung']);
            $table->integer('total_item');
            $table->integer('total_harga');
            $table->string('metode_pembayaran')->nullable();
            $table->string('catatan_customer')->nullable();
            $table->enum('status_transaksi', ['diproses', 'ditolak', 'selesai']);
            $table->string('catatan_admin')->nullable();
            $table->date('tanggal_konfirmasi');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
    }
}
