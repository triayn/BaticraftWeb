@extends('customer.layouts.main')
@section('content')
<section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <!-- card -->
                <div class="card py-1 border-0 mb-8">
                    <div>
                        <h1 class="fw-bold">Keranjang Belanja</h1>
                        <!-- <p class="mb-0">Shopping in 382480</p> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="py-3">
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    <ul class="list-group list-group-flush">
                        @if($carts->isEmpty())
                        <li class="list-group-item py-3 py-lg-0 px-0 border-top text-center">
                            <div class="row align-items-center">
                                <div class="col-12">
                                    <h4 class="mb-0">Keranjang Anda Kosong</h4>
                                    <p class="text-muted">Tambahkan produk ke keranjang untuk melanjutkan pemesanan.</p>
                                </div>
                            </div>
                        </li>
                        @else
                        @foreach ($carts as $item)
                        <!-- list group -->
                        <li class="list-group-item py-3 py-lg-0 px-0 border-top">
                            <!-- row -->
                            <div class="row align-items-center">
                                <div class="col-3 col-md-2">
                                    @if(isset($images->where('product_id', $item->product->id)->first()->image_path))
                                    <img src="{{ asset('storage/product/' . $images->where('product_id', $item->product->id)->first()->image_path) }}" class="card-img-top" alt="">
                                    @endif
                                </div>
                                <div class="col-4 col-md-6">
                                    <!-- title -->
                                    <h6 class="mb-0">{{ $item->product->nama }}</h6>
                                    <!-- text -->
                                    <div class="mt-2 small">
                                        <button type="button" class="btn btn-link text-decoration-none text-inherit" data-bs-toggle="modal" data-bs-target="#info-header-modal-{{ $item->id }}">
                                            <span class="me-1 align-text-bottom">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-success">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </span>
                                            <span class="text-muted">Hapus</span>
                                        </button>
                                        <div class="modal fade" id="info-header-modal-{{ $item->id }}" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-body p-6">
                                                        <div class="d-flex justify-content-between align-items-start ">
                                                            <div>
                                                                <h3 class="mb-2" id="locationModalLabel">Hapus Produk?</h3> <br>
                                                                <h6 class="mb-2">Anda yakin ingin menghapus produk {{ $item->product->nama }} dari keranjang? </h6>
                                                            </div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center mb-2" style="margin-top: 10px;">
                                                            <form action="{{ route('keranjang.delete', $item->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-info">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 col-md-3 col-lg-2">
                                    <form action="{{ route('keranjang.update', $item->id) }}" method="POST" id="quantity-update-form-{{ $item->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="input-group flex-nowrap justify-content-center">
                                            <button type="button" class="button-minus form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0" onclick="changeQuantity('{{ $item->id }}', -1)">-</button>
                                            <input type="number" step="1" max="{{ $item->product->stok }}" value="{{ $item->jumlah }}" name="jumlah" id="quantity-{{ $item->id }}" class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0" readonly>
                                            <button type="button" class="button-plus form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0" onclick="changeQuantity('{{ $item->id }}', 1)">+</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- price -->
                                <div class="col-2 text-lg-end text-start text-md-end col-md-2">
                                    <span class="fw-bold">Rp {{ number_format($item->product->harga, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('etalase.index') }}" class="btn btn-info">Tambah Produk</a>
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            <div class="col-12 col-lg-4 col-md-5">
                <!-- card -->
                <div class="mb-5 card mt-6">
                    <form action="{{ route('keranjang.checkout') }}" method="POST" class="d-inline">
                        @csrf
                        <div class="card-body p-6">
                            <h2 class="h5 mb-4">Detail Pesanan</h2>
                            <div class="card mb-2">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div>Total Item</div>
                                        </div>
                                        <span>{{ $totalItems }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="me-auto">
                                            <div>Total Harga</div>
                                        </div>
                                        <span>Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-grid mb-1 mt-4">
                                <button class="btn btn-primary btn-lg d-flex justify-content-between align-items-center" type="submit">
                                    Checkout
                                </button>
                            </div>
                            <div class="mt-8">
                                <h2 class="h5 mb-3">Tambahkan Catatan</h2>
                                <div class="mb-2">
                                    <input type="text" class="form-control" id="catatan_customer" name="catatan_customer" placeholder="Tulis disini">
                                </div>
                            </div>
                            <!-- Tambahkan input hidden untuk total item dan total harga -->
                            <input type="hidden" name="total_item" value="{{ $totalItems }}">
                            <input type="hidden" name="total_harga" value="{{ $totalPrice }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Notif Berhasil -->
@if (session('success'))
<div class="modal fade" id="success-alert-modal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-6">
                <div class="d-flex justify-content-between align-items-start ">
                    <div>
                        <h5 class="mb-1">Berhasil!</h5>
                        <p class="mb-0 small">{{ session('success') }}</p>
                    </div>
                    <button type="button" class="btn btn-primary my-2" data-bs-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('script')
<script>
    function decreaseQuantity(id) {
        var quantityInput = document.getElementById('quantity-' + id);
        if (quantityInput.value > 1) {
            quantityInput.value--;
            document.getElementById('quantity-update-form-' + id).submit();
        }
    }

    function increaseQuantity(id) {
        var quantityInput = document.getElementById('quantity-' + id);
        quantityInput.value++;
        document.getElementById('quantity-update-form-' + id).submit();
    }
</script>
<script>
    function changeQuantity(itemId, delta) {
        var quantityInput = document.getElementById('quantity-' + itemId);
        var newQuantity = parseInt(quantityInput.value) + delta;
        var maxQuantity = parseInt(quantityInput.max);
        if (newQuantity > 0 && newQuantity <= maxQuantity) {
            quantityInput.value = newQuantity;
            document.getElementById('quantity-update-form-' + itemId).submit();
        }
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
        var successModal = new bootstrap.Modal(document.getElementById('success-alert-modal'));
        successModal.show();
        @endif
    });
</script>
@endsection