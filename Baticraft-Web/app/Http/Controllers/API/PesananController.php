<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ImageProduct;
use App\Models\Informations;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $menunggu = Transaction::where('status_transaksi', 'menunggu')->get();
        $diproses = Transaction::where('status_transaksi', 'diproses')->get();
        $ditolak = Transaction::where('status_transaksi', 'ditolak')->get();
        $selesai = Transaction::where('status_transaksi', 'selesai')->get();

        return response()->json([
            'menunggu' => $menunggu,
            'diproses' => $diproses,
            'ditolak' => $ditolak,
            'selesai' => $selesai
        ]);
    }

    public function detail($id)
    {
        $info = Informations::first();
        $transaction = Transaction::findOrFail($id);
        $detail = TransactionDetail::where('transaction_id', $id)->get();
        $produk = Product::whereIn('id', $detail->pluck('product_id'))->get();
        $imageArray = [];
        foreach ($produk as $product) {
            $image = ImageProduct::where('product_id', $product->id)->first();
            if ($image) {
                $imageArray[$product->id] = $image;
            }
        }

        return response()->json([
            'info' => $info,
            'transaction' => $transaction,
            'detail' => $detail,
            'produk' => $produk,
            'imageArray' => $imageArray
        ]);
    }

    public function konfirmasiDiterima(Request $request)
    {
        // Validasi input dari form modal dengan pesan kesalahan khusus
        $request->validate([
            'tanggalPengambilan' => 'required|date',
            'tanggalKadaluarsa' => 'required|date|after:tanggalPengambilan',
        ], [
            'tanggalKadaluarsa.after' => 'Tanggal Kadaluarsa Harus Setelah Tanggal Pengambilan'
        ]);

        // Ambil data dari form modal
        $tanggalPengambilan = $request->input('tanggalPengambilan');
        $tanggalKadaluarsa = $request->input('tanggalKadaluarsa');
        $idTransaksi = $request->input('idTransaksi');

        // Update data transaksi sesuai dengan idTransaksi
        $transaksi = Transaction::find($idTransaksi);
        if (!$transaksi) {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        // Cek tanggal pengambilan harus setelah tanggal pemesanan
        $tanggalPemesanan = $transaksi->created_at;
        if ($tanggalPengambilan <= $tanggalPemesanan) {
            return response()->json(['error' => 'Tanggal Pengambilan Harus Setelah Tanggal Pemesanan'], 422);
        }

        // Cek tanggal kadaluarsa harus setelah tanggal pengambilan
        if ($tanggalKadaluarsa <= $tanggalPengambilan) {
            return response()->json(['error' => 'Tanggal Kadaluarsa Harus Setelah Tanggal Pengambilan'], 422);
        }

        // Update data transaksi
        $transaksi->kasir = auth()->user()->name;
        $transaksi->status_transaksi = 'diproses';
        $transaksi->tanggal_konfirmasi = $tanggalPengambilan;
        $transaksi->tanggal_expired = $tanggalKadaluarsa;
        $transaksi->save();

        return response()->json(['success' => 'Transaksi berhasil diproses'], 200);
    }

    public function konfirmasiDitolak(Request $request)
    {
        // Validasi input dari form modal
        $request->validate([
            'alasanPenolakan' => 'required',
            'idTransaksi' => 'required', // Sesuaikan dengan nama input ID transaksi di form modal
        ]);

        // Ambil data dari form modal
        $alasanPenolakan = $request->input('alasanPenolakan');
        $idTransaksi = $request->input('idTransaksi');

        // Update data transaksi sesuai dengan idTransaksi
        $transaksi = Transaction::find($idTransaksi);
        if (!$transaksi) {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        // Update data transaksi
        $transaksi->kasir = auth()->user()->name; // Menggunakan nama kasir dari user yang login
        $transaksi->status_transaksi = 'ditolak';
        $transaksi->catatan_admin = $alasanPenolakan;
        $transaksi->save();

        return response()->json(['success' => 'Transaksi Ditolak'], 200);
    }

    public function konfirmasiSelesai(Request $request)
    {
        // Ambil data dari form modal
        $idTransaksi = $request->input('idTransaksi'); // Sesuaikan dengan nama input ID transaksi di form modal

        // Update data transaksi sesuai dengan idTransaksi
        $transaksi = Transaction::find($idTransaksi);
        if (!$transaksi) {
            return response()->json(['error' => 'Transaksi tidak ditemukan'], 404);
        }

        // Update data transaksi
        $transaksi->kasir = auth()->user()->nama; // Menggunakan nama kasir dari user yang login
        $transaksi->status_transaksi = 'selesai';
        $transaksi->save();

        return response()->json(['success' => 'Transaksi berhasil diproses'], 200);
    }
}
