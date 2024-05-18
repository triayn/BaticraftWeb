<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Informations;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class PesananCustomerController extends Controller
{
    public function index()
    {
        $menunggu = Transaction::where('status_transaksi', 'menunggu')->get();
        $diproses = Transaction::where('status_transaksi', 'diproses')->get();
        $ditolak = Transaction::where('status_transaksi', 'ditolak')->get();
        $selesai = Transaction::where('status_transaksi', 'selesai')->get();

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
        return view('customer.pesanan.menunggu', compact('info', 'transaction', 'detail', 'produk', 'imageArray'));
    }
}
