<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\TransactionDetail;

class TransactionController extends Controller
{
    public function insertNew(Request $request)
    {
        // Validasi request
        $request->validate([
            'kode_transaksi' => 'required|string',
            'user_id' => 'required|integer',
            'kasir' => 'required|String',
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
         $today = Carbon::now(); // Contoh: Tanggal expired 7 hari dari sekarang

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
                    ['created_at' => $today] // Tambahkan tanggal_expired ke data transaksi
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

            return response()->json(['message' => $e]);
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
            ->leftJoin('users as pembeli', 'transactions.user_id', '=', 'pembeli.id')
            ->where('transactions.id', $transactionId)
            ->select('transactions.*', 'pembeli.nama as nama_pembeli')
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

    public function pendapatanHariIni()
    {
        $date = Carbon::now();
    
        
        $totalRevenue = Transaction::whereDate('created_at', $date)
        
        ->sum('total_harga');
    
    
        $totalProductsSold = Transaction::whereDate('created_at', $date)->sum('total_item');
    
        
        $totalBuyers = Transaction::whereDate('created_at', $date)->distinct()->count('user_id');
    
        return response()->json([
            'date' => $date->toDateString(),
            'total_revenue' => $totalRevenue,
            'total_products_sold' => $totalProductsSold,
            'total_buyers' => $totalBuyers
        ]);
    }
    

    public function pendapatanJangkaWaktu(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date'))->startOfDay();
        $endDate = Carbon::parse($request->input('end_date'))->endOfDay();
    
        $revenuesByDate = DB::table('transactions')
            ->selectRaw('DATE(created_at) as date, SUM(total_harga) as total_revenue, COUNT(DISTINCT user_id) as total_buyers')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('status_transaksi', 'selesai')
            ->groupBy('date')
            ->get();
    
        // Menghitung total produk terjual
        $totalProductsSold = DB::table('transactions')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('status_transaksi', 'selesai')
            ->sum('total_item');
    
        // Menghitung total pendapatan
        $totalRevenue = $revenuesByDate->sum('total_revenue');
    
        // Menghitung total pembeli
        $totalBuyers = $revenuesByDate->sum('total_buyers');
    
        $output = [
            "TotalprodukTerjual" => $totalProductsSold,
            "TotalPendapatan" => $totalRevenue,
            "JumlahPembeli" => $totalBuyers,
            "data" => $revenuesByDate
        ];
    
        return response()->json($output);
    }
    
    
    
    public function pendapatanBulanan(Request $request)
    {
        $year = $request->input('year');
        $currentMonth = Carbon::now()->month; // Bulan sekarang
        $months = [];
        $totalPendapatanTahunIni = 0;
        $totalProdukTerjualBulanIni = 0;
        $totalPembeliBulanIni = 0;
    
        // Buat array dengan nama bulan dalam format huruf
        $monthNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
    
        // Lakukan iterasi untuk setiap bulan dalam setahun
        for ($month = 1; $month <= 12; $month++) {
            // Buat tanggal awal dan akhir bulan
            $startDate = Carbon::createFromDate($year, $month, 1)->startOfMonth();
            $endDate = Carbon::createFromDate($year, $month, 1)->endOfMonth();
    
            // Hitung total pendapatan untuk bulan tersebut
            $totalRevenue = DB::table('transactions')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->sum('total_harga');
    
            // Jika total pendapatan lebih dari 0, tambahkan ke array
            if ($totalRevenue > 0) {
                $months[] = [
                    'bulan' => $monthNames[$month - 1], // Ambil nama bulan dari array $monthNames
                    'total_produk_terjual' => $this->getTotalProductsSold($startDate, $endDate),
                    'total_pembeli' => $this->getTotalBuyers($startDate, $endDate),
                    'total_pendapatan' => $totalRevenue
                ];
                // Tambahkan total pendapatan tahun ini
                $totalPendapatanTahunIni += $totalRevenue;
    
                // Jika bulan ini, tambahkan total produk terjual dan pembeli
                if ($month === $currentMonth) {
                    $totalProdukTerjualBulanIni = $months[count($months) - 1]['total_produk_terjual'];
                    $totalPembeliBulanIni = $months[count($months) - 1]['total_pembeli'];
                }
            }
        }
    
        return response()->json([
            'pendapatanTahunIni' => $totalPendapatanTahunIni,
            'ProdukTerjualBulanIni' => $totalProdukTerjualBulanIni,
            'pembeliBulanIni' => $totalPembeliBulanIni,
            'data' => $months
        ]);
    }
    
    // Method untuk menghitung total produk terjual dalam bulan tertentu
    private function getTotalProductsSold($startDate, $endDate)
    {
        return DB::table('transactions')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('total_item');
    }
    
    // Method untuk menghitung total pembeli dalam bulan tertentu
    private function getTotalBuyers($startDate, $endDate)
    {
        return DB::table('transactions')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->distinct('user_id')
            ->count('user_id');
    }
   
    public function getTransactionData()
    {
        $transactions = DB::table('transactions')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->select('transactions.id','transactions.catatan_customer', 'transactions.kode_transaksi', 'users.nama', 'transactions.created_at', 'users.image')
            ->where('transactions.status_transaksi', 'menunggu')
            ->distinct() // Tambahkan metode distinct untuk mencegah tampilan kode transaksi yang sama
            ->get();
    
        $formattedTransactions = $transactions->map(function ($transaction) {
            $barangDibeli = $this->getBarangDibeli($transaction->id);
    
            return [
                'id' => $transaction->id,
                'kode_transaksi' => $transaction->kode_transaksi,
                'nama' => $transaction->nama,
                'tanggal' => date('d/m/Y', strtotime($transaction->created_at)),
                'catatan_customer' => $transaction->catatan_customer,
                'image' => $transaction->image,
                'nama_barang' => $barangDibeli,
            ];
        });
    
        return $formattedTransactions->toArray();
    }
    public function getTransactionDataLimit()
    {
        $transactions = DB::table('transactions')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->select('transactions.id','transactions.catatan_customer', 'transactions.kode_transaksi', 'users.nama', 'transactions.created_at', 'users.image')
            ->where('transactions.status_transaksi', 'menunggu')
            ->distinct() // Tambahkan metode distinct untuk mencegah tampilan kode transaksi yang sama
            ->limit(3)
            ->get();
    
        $formattedTransactions = $transactions->map(function ($transaction) {
            $barangDibeli = $this->getBarangDibeli($transaction->id);
    
            return [
                'id' => $transaction->id,
                'kode_transaksi' => $transaction->kode_transaksi,
                'nama' => $transaction->nama,
                'tanggal' => date('d/m/Y', strtotime($transaction->created_at)),
                'catatan_customer' => $transaction->catatan_customer,
                'image' => $transaction->image,
                'nama_barang' => $barangDibeli,
            ];
        });
    
        return $formattedTransactions->toArray();
    }
    
    public function getCariTransactionData(Request $request)
    {$searchNama = $request->input('search');
        $transactions = DB::table('transactions')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->select('transactions.id','transactions.catatan_customer', 'transactions.kode_transaksi', 'users.nama', 'transactions.created_at', 'users.image')
            ->where('transactions.status_transaksi', 'menunggu')
            ->where('users.nama', 'like', '%' . $searchNama . '%')
            ->distinct()
            ->get();
    
        $formattedTransactions = $transactions->map(function ($transaction) {
            $barangDibeli = $this->getBarangDibeli($transaction->id);
    
            return [
                'id' => $transaction->id,
                'kode_transaksi' => $transaction->kode_transaksi,
                'nama' => $transaction->nama,
                'tanggal' => date('d/m/Y', strtotime($transaction->created_at)),
                'catatan_customer' => $transaction->catatan_customer,
                'image' => $transaction->image,
                'nama_barang' => $barangDibeli,
            ];
        });
    
        return $formattedTransactions->toArray();
    }

    private function getBarangDibeli($transactionId)
    {
        $barangDibeli = DB::table('transaction_details')
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->select('products.nama')
            ->where('transaction_details.transaction_id', $transactionId)
            ->pluck('nama')
            ->map(function ($nama) {
                // Mengambil dua kata pertama dari nama produk
                return implode(' ', array_slice(explode(' ', $nama), 0, 2));
            })
            ->implode(',');
    
        return $barangDibeli;
    }

    
    public function tolakPesanan(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'id' => 'required|integer',
            'catatan_admin' => 'required|string|max:255',
        ]);

        try {
            // Temukan transaksi berdasarkan ID yang diterima dari permintaan
            $transaction = Transaction::findOrFail($request->id);

            // Update status_transaksi menjadi 'ditolak' dan tambahkan catatan_admin
            $transaction->status_transaksi = 'ditolak';
            $transaction->catatan_admin = $request->catatan_admin;
            $transaction->save();

            return response()->json(['message' => 'Transaksi ditolak'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menolak transaksi'], 500);
        }
    }

    public function prosesPesanan(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'id' => 'required|integer',
            'tanggal_konfirmasi' => 'required|string',
            'tanggal_expired' => 'required|string',
        ]);
    
        try {
            // Temukan transaksi berdasarkan ID yang diterima dari permintaan
            $transaction = Transaction::findOrFail($request->id);
    
            // Update status_transaksi menjadi 'diproses', tambahkan tanggal konfirmasi dan tanggal expired
            $transaction->status_transaksi = 'diproses';
            $transaction->tanggal_konfirmasi = $request->tanggal_konfirmasi;
            $transaction->tanggal_expired = $request->tanggal_expired;
            $transaction->save();
    
            return response()->json(['message' => 'Transaksi diproses'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memproses transaksi '.$e], 500);
        }
    }
    
    //Riwayat
    public function showRiwayatProses()
    {
        try {
            // Mengambil detail transaksi yang memiliki status_transaksi 'selesai'
            $completedTransactions = Transaction::where('status_transaksi', 'diproses')->get();

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
    public function showRiwayatSelesai()
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
    public function showRiwayatTolak()
    {
        try {
            // Mengambil detail transaksi yang memiliki status_transaksi 'selesai'
            $completedTransactions = Transaction::where('status_transaksi', 'ditolak')->get();

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

    public function searchSelesai(Request $request)
    {
        $searchText = $request->input('search');

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
    public function searchTolak(Request $request)
    {
        $searchText = $request->input('search');

        // Mencari detail transaksi
        $transactionDetails = DB::table('transaction_details as td')
            ->select('td.', 't.')
            ->join('transactions as t', 'td.transaction_id', '=', 't.id')
            ->join('products as p', 'td.product_id', '=', 'p.id')
            ->Where('t.kode_transaksi', 'like', '%' . $searchText . '%')
            ->where('t.status_transaksi', 'ditolak')
            ->get();


        return response()->json($transactionDetails);
    }
    public function searchProses(Request $request)
    {
        $searchText = $request->input('search');

        // Mencari detail transaksi
        $transactionDetails = DB::table('transaction_details as td')
            ->select('td.', 't.')
            ->join('transactions as t', 'td.transaction_id', '=', 't.id')
            ->join('products as p', 'td.product_id', '=', 'p.id')
            ->Where('t.kode_transaksi', 'like', '%' . $searchText . '%')
            ->where('t.status_transaksi', 'diproses')
            ->get();


        return response()->json($transactionDetails);
    }

    public function PesananDiambil(Request $request)
    {
        // Validasi input dari request
        $request->validate([
            'id' => 'required|integer',
        ]);

        try {
            // Temukan transaksi berdasarkan ID yang diterima dari permintaan
            $transaction = Transaction::findOrFail($request->id);

            // Update status_transaksi menjadi 'ditolak' dan tambahkan catatan_admin
            $transaction->status_transaksi = 'selesai';
            $transaction->save();

            return response()->json(['message' => 'Transaksi ditolak'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menolak transaksi'], 500);
        }
    }

}