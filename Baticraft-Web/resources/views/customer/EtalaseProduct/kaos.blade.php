@extends('customer.layouts.main')
@section('content')
<section class="mt-8 mb-lg-14 mb-8">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row gx-10">
            <!-- col -->
            <div class="col-lg-3 col-md-4 mb-6 mb-md-0">
                <div class="py-4">
                    <!-- heading -->
                    <h5 class="mb-3">Kategori</h5>
                    <!-- nav -->
                    <ul class="nav nav-category">
                        <!-- nav item -->
                        <li class="nav-item border-bottom w-100">
                            <a href="{{ route('etalase.index') }}">Semua</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item border-bottom w-100">
                            <a href="{{ route('etalase.kain') }}">Kain</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item border-bottom w-100">
                            <a href="{{ route('etalase.kemeja') }}">Kemeja</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item border-bottom w-100">
                            <a href="{{ route('etalase.kaos') }}">Kaos</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <p>Kaos</p>
                <!-- row -->
                <div class="row g-4 row-cols-xl-3 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                    <!-- col -->
                    @foreach ($data as $row)
                    <div class="col">
                        <!-- card -->
                        <div class="card card-product">
                            <div class="card-body">

                                <!-- badge -->
                                <div class="text-center position-relative ">
                                    <a href="#!">
                                        @if($images->isNotEmpty())
                                        @foreach($images as $image)
                                        @if($image->product_id == $row->id)
                                        <img src="{{ asset('storage/product/' . $image->image_path) }}" class="mb-3 img-fluid" />
                                        @break
                                        @endif
                                        @endforeach
                                        @endif
                                        <div class="card-product-action">
                                            <a href="{{ route('etalase.detail', $row->id) }}" class="btn-action"><i class="bi bi-eye" data-bs-html="true" title="Detail Produk"></i></a>
                                        </div>
                                </div>
                                <!-- heading -->
                                <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{ $row->kategori }}</small></a></div>
                                <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{ $row->nama }}</a></h2>
                                <!-- price -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <div><span class="text-dark">Rp {{ number_format($row->harga, 0, ',', '.') }}</span>
                                    </div>
                                    <!-- btn -->
                                    <form action="{{ route('keranjang.add') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $row->id }}"> <!-- Ganti dengan ID produk yang sesuai -->
                                        <input type="hidden" name="jumlah" value="1"> <!-- Ganti dengan jumlah produk yang ingin ditambahkan -->
                                        <button type="submit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#success-alert-modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg> Keranjang
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade"  id="success-alert-modal" tabindex="-1" aria-labelledby="locationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body p-6">
        <div class="d-flex justify-content-between align-items-start ">
          <div>
            <h5 class="mb-1">Berhasil!</h5>
            <p class="mb-0 small">Produk sudah berhasil ditambahkan ke keranjang. </p>
          </div>
          <button type="button" class="btn btn-primary my-2" data-bs-dismiss="modal">Kembali</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection