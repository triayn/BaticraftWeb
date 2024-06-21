<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function masuk()
    {
        $menunggu = Transaction::with('user')->where('status_transaksi', 'menunggu')->get();

        return view('admin.PesananMasuk.index', compact('menunggu'));

    }

    public function diproses()
    {
        $diproses = Transaction::with('user')->where('status_transaksi', 'diproses')->get();

        return view('admin.PesananDiproses.index', compact('diproses'));
    }

    public function riwayat()
    {
        $riwayat = Transaction::with('user')
            ->where('status_transaksi', 'ditolak')
            ->orWhere('status_transaksi', 'selesai')
            ->get();

        return view('admin.RiwayatPesanan.index', compact('riwayat'));
    }

    public function editMasuk($id)
    {

        $user = auth()->user();
        $transaction = Transaction::with('user')->findOrFail($id);
        $detail = TransactionDetail::where('transaction_id', $id)->get();
        $product = Product::whereIn('id', $detail->pluck('product_id'))->get();

        return view('admin.PesananMasuk.konfirmasi', compact('user', 'transaction', 'detail', 'product'));
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
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        // Cek tanggal pengambilan harus setelah tanggal pemesanan
        $tanggalPemesanan = $transaksi->created_at;
        if ($tanggalPengambilan <= $tanggalPemesanan) {
            return redirect()->back()->with('error', 'Tanggal Pengambilan Harus Setelah Tanggal Pemesanan');
        }

        // Cek tanggal kadaluarsa harus setelah tanggal pengambilan
        if ($tanggalKadaluarsa <= $tanggalPengambilan) {
            return redirect()->back()->with('error', 'Tanggal Kadaluarsa Harus Setelah Tanggal Pengambilan');
        }

        // Update data transaksi
        $transaksi->kasir = auth()->user()->name;
        $transaksi->status_transaksi = 'diproses';
        $transaksi->tanggal_konfirmasi = $tanggalPengambilan;
        $transaksi->tanggal_expired = $tanggalKadaluarsa;
        $transaksi->save();

        return redirect()->route('diproses.index')->with('success', 'Transaksi berhasil diproses');
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
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        // Update data transaksi
        $transaksi->kasir = auth()->user()->name; // Menggunakan nama kasir dari user yang login
        $transaksi->status_transaksi = 'ditolak';
        $transaksi->catatan_admin = $alasanPenolakan;
        $transaksi->save();

        return redirect()->route('riwayat.index')->with('success', 'Transaksi Ditolak');
    }

    public function editDiproses($id)
    {

        $user = auth()->user();
        $transaction = Transaction::with('user')->findOrFail($id);
        $detail = TransactionDetail::where('transaction_id', $id)->get();
        $product = Product::whereIn('id', $detail->pluck('product_id'))->get();

        return view('admin.PesananDiproses.konfirmasi', compact('user', 'transaction', 'detail', 'product'));
    }

    public function konfirmasiSelesai(Request $request)
    {
        // Ambil data dari form modal
        $idTransaksi = $request->input('idTransaksi'); // Sesuaikan dengan nama input ID transaksi di form modal

        // Update data transaksi sesuai dengan idTransaksi
        $transaksi = Transaction::find($idTransaksi);
        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        // Update data transaksi
        $transaksi->kasir = auth()->user()->nama; // Menggunakan nama kasir dari user yang login
        $transaksi->status_transaksi = 'selesai';
        $transaksi->save();

        return redirect()->route('riwayat.index')->with('success', 'Transaksi berhasil diproses');
    }

    public function pesan($id)
    {

        $transaction = Transaction::with('user')->findOrFail($id);
        $detail = TransactionDetail::where('transaction_id', $id)->get();
        $product = Product::whereIn('id', $detail->pluck('product_id'))->get();

        return view('admin.RiwayatPesanan.pesan', compact('transaction', 'detail', 'product'));
    }

    public function langsung($id)
    {

        $transaction = Transaction::with('user')->findOrFail($id);
        $detail = TransactionDetail::where('transaction_id', $id)->get();
        $product = Product::whereIn('id', $detail->pluck('product_id'))->get();

        return view('admin.RiwayatPesanan.langsung', compact('transaction', 'detail', 'product'));
    }

    public function ditolak($id)
    {

        $transaction = Transaction::with('user')->findOrFail($id);
        $detail = TransactionDetail::where('transaction_id', $id)->get();
        $product = Product::whereIn('id', $detail->pluck('product_id'))->get();

        return view('admin.RiwayatPesanan.ditolak', compact('transaction', 'detail', 'product'));
    }
}
