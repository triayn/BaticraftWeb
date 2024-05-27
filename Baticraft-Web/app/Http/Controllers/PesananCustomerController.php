<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Informations;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;

class PesananCustomerController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Dapatkan ID user yang sedang login

        $menunggu = Transaction::where('status_transaksi', 'menunggu')->where('user_id', $userId)->get();
        $diproses = Transaction::where('status_transaksi', 'diproses')->where('user_id', $userId)->get();
        $ditolak = Transaction::where('status_transaksi', 'ditolak')->where('user_id', $userId)->get();
        $selesai = Transaction::where('status_transaksi', 'selesai')->where('user_id', $userId)->get();

        return view('customer.pesanan.index', compact('menunggu', 'diproses', 'ditolak', 'selesai'));
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
        return view('customer.pesanan.detail', compact('info', 'transaction', 'detail', 'produk', 'imageArray'));
    }
}
