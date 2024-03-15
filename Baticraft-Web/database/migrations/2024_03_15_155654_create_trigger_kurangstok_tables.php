<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER kurang_stok AFTER INSERT ON detail_transactions
            FOR EACH ROW
            BEGIN
                UPDATE produks
                SET stok = stok - NEW.jumlah_barang
                WHERE id = NEW.produk_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS kurang_stok');
    }
};
