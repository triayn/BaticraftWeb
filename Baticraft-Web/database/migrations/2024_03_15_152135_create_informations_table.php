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
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilik');
            $table->string('nama_toko');
            $table->string('alamat');
            $table->text('deskripsi');
            $table->string('no_telpon', 15);
            $table->string('email')->unique();
            $table->string('akun_ig');
            $table->string('akun_fb');
            $table->string('akun_tiktok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informations');
    }
};
