<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
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
            'transaction_details' => 'required|array',
            'transaction_details.*.product_id' => 'required|integer',
            'transaction_details.*.nama_product' => 'required|string',
            'transaction_details.*.jumlah' => 'required|integer',
            'transaction_details.*.harga_total' => 'required|numeric',
        ]);

        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Tambahkan tanggal_expired
            $tanggalExpired = Carbon::now()->addDays(7); // Contoh: Tanggal expired 7 hari dari sekarang

            // Insert data transaksi
            $transaksi = DB::table('transactions')->insertGetId(
                array_merge(
                    $request->only([
                        'kode_transaksi',
                        'user_id',
                        'kasir',
                        'jenis_transaksi',
                        'total_item',
                        'total_harga',
                        'status_transaksi',
                        'tanggal_konfirmasi',
                    ]),
                    ['tanggal_expired' => $tanggalExpired] // Tambahkan tanggal_expired ke data transaksi
                )
            );

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

            return response()->json(['message' => $e], 500);
        }
    }
    public function showCompletedTransactions()
    {
        try {
            // Mengambil detail transaksi yang memiliki status_transaksi 'selesai'
            $completedTransactions = Transaction::where('status_transaksi', 'selesai')->get();

            // Jika tidak ada transaksi yang ditemukan
            if ($completedTransactions->isEmpty()) {
                return response()->json(['message' => 'Tidak ada transaksi yang telah selesai'], 404);
            }

            // Jika ada transaksi yang ditemukan
            return response()->json($completedTransactions);
        } catch (\Exception $e) {
            // Jika terjadi error
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');

        // // Mencari transaksi
        // $transactions = DB::table('transactions')
        //     ->select('id', 'kode_transaksi', 'status_transaksi', 'tanggal_konfirmasi', 'tanggal_expired')
        //     ->where('kode_transaksi', 'like', '%' . $searchText . '%')
        //     ->orWhere('status_transaksi', 'selesai')
        //     ->orWhere('tanggal_konfirmasi', 'like', '%' . $searchText . '%')
        //     ->orWhere('tanggal_expired', 'like', '%' . $searchText . '%')
        //     ->get();

        // Mencari detail transaksi
        $transactionDetails = DB::table('transaction_details as td')
            ->select('td.', 't.')
            ->join('transactions as t', 'td.transaction_id', '=', 't.id')
            ->join('products as p', 'td.product_id', '=', 'p.id')
            ->Where('t.kode_transaksi', 'like', '%' . $searchText . '%')
            ->where('t.status_transaksi', 'selesai')
            ->get();


        return response()->json($transactionDetails);
    }

    public function showTransactionAndDetails(Request $request)
    {
        try {
            $transactionId = $request->input('id');

            // Mengambil transaksi berdasarkan ID
            $transaction = DB::table('transactions')
                ->where('id', $transactionId)
                ->first();

            // Mengambil satu gambar untuk setiap detail transaksi berdasarkan ID transaksi
            $transactionDetails = DB::table('transaction_details as td')
                ->leftJoin('image_products as ip', function ($join) {
                    $join->on('td.product_id', '=', 'ip.product_id')
                        ->whereRaw('ip.id = (SELECT id FROM image_products WHERE product_id = td.product_id LIMIT 1)');
                })
                ->where('td.transaction_id', $transactionId)
                ->select('td.*', 'ip.image_path')
                ->get();

            // Jika transaksi atau detail transaksi tidak ditemukan
            if (!$transaction || $transactionDetails->isEmpty()) {
                return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
            }

            // Mengonversi transaksi dan detail transaksi menjadi array
            $transactionArray = (array) $transaction;
            $transactionDetailsArray = $transactionDetails->toArray();

            // Menyertakan detail transaksi dalam array transaksi
            $transactionArray['details'] = $transactionDetailsArray;

            return response()->json($transactionArray);
        } catch (\Exception $e) {
            // Jika terjadi error
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
 