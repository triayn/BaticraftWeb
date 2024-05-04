<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function insertNew(Request $request)
    {
        // Validasi request
        $request->validate([
            'kode_transaksi' => 'required|string',
            'user_id' => 'required|integer',
            'kasir' => 'required|integer',
            'jenis_transaksi' => 'required|string',
            'total_item' => 'required|integer',
            'total_harga' => 'required|numeric',
            'status_transaksi' => 'required|string',
            'tanggal_konfirmasi' => 'required|date',
            'tanggal_expired' => 'required|date',
            'transaction_details' => 'required|array',
            'transaction_details.*.product_id' => 'required|integer',
            'transaction_details.*.nama_product' => 'required|string',
            'transaction_details.*.jumlah' => 'required|integer',
            'transaction_details.*.harga_total' => 'required|numeric',
        ]);

        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Insert data transaksi
            $transaksi = DB::table('transactions')->insertGetId($request->only([
                'kode_transaksi',
                'user_id',
                'kasir',
                'jenis_transaksi',
                'total_item',
                'total_harga',
                'status_transaksi',
                'tanggal_konfirmasi',
                'tanggal_expired',
            ]));

            // Insert data detail transaksi
            foreach ($request->transaction_details as $detail) {
                $detail['transaction_id'] = $transaksi;
                DB::table('transaction_details')->insert($detail);
            }

            // Commit transaksi database
            DB::commit();

            return response()->json(['message' => 'Transaksi berhasil ditambahkan'], 201);
        } catch (\Exception $e) {
            // Rollback transaksi database jika terjadi error
            DB::rollback();

            return response()->json(['message' => $transaksi], 500);
        }
    }
}
