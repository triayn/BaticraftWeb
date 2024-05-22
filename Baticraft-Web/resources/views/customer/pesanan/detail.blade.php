@extends('customer.layouts.main')

@section('content')
<section class="mb-lg-14 mb-8 mt-8">
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <div>
                    <div class="mb-8">
                        <!-- text -->
                        <h1 class="fw-bold mb-0">Detail Pesanan</h1>
                        <!-- <p class="mb-0">Already have an account? Click here to <a href="#!">Sign in</a>.</p> -->
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <!-- accordion -->
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <!-- accordion item -->
                        <div class="accordion-item py-4">

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- heading one -->
                                <a href="#" class="fs-5 text-inherit collapsed h4" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                    <i class="feather-icon icon-map-pin me-2 text-muted"></i>Alamat Pengambilan Barang
                                </a>
                            </div>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                                <div class="mt-5">
                                    <div class="row">
                                        <div class="col-lg-12 col-12 mb-4">
                                            <!-- form -->
                                            <div class="border p-6 rounded-3">
                                                <div class="form-check mb-4">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="homeRadio" checked>
                                                    <label class="form-check-label text-dark" for="homeRadio">
                                                        Alamat Toko
                                                    </label>
                                                </div>
                                                <!-- address -->
                                                <address> <strong>{{ $info->nama_toko }}</strong> <br>

                                                    {{ $info->alamat }} <br>

                                                    <abbr title="Phone">{{ $info->no_telpon }}</abbr>
                                                </address>
                                                <a href="{{ $info->lokasi }}"><span class="text-info">Maps </span></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- accordion item -->
                        <div class="accordion-item py-4">

                            <a href="#" class="text-inherit h5" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <i class="feather-icon icon-shopping-bag me-2 text-muted"></i>Informasi Pesanan
                                <!-- collapse --> </a>
                            <div id="flush-collapseThree" class="accordion-collapse collapse " data-bs-parent="#accordionFlushExample">

                                <div class="mt-5">
                                    <label for="DeliveryInstructions" class="form-label sr-only">Kode Pesanan</label>
                                    <textarea class="form-control" id="DeliveryInstructions" rows="3" placeholder="Write delivery instructions" readonly>{{ $transaction->kode_transaksi }}</textarea>
                                </div>
                                <div class="mt-5">
                                    <label for="DeliveryInstructions" class="form-label sr-only">Status Pesanan</label>
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="homeRadio" checked>
                                        @if($transaction->status_transaksi == 'menunggu')
                                        <label class="form-check-label text-info" for="homeRadio">Menunggu</label>
                                        @elseif($transaction->status_transaksi == 'diproses')
                                        <label class="form-check-label text-warning" for="homeRadio">Diproses</label>
                                        @elseif($transaction->status_transaksi == 'ditolak')
                                        <label class="form-check-label text-danger" for="homeRadio">Ditolak</label>
                                        @else
                                        <label class="form-check-label text-success" for="homeRadio">Selesai</label>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- accordion item -->
                        <div class="accordion-item py-4">
                            <a href="#" class="text-inherit collapsed h5" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <i class="feather-icon icon-clock me-2 text-muted"></i>Waktu
                            </a>
                            <!-- collapse -->
                            <div id="flush-collapseTwo" class="accordion-collapse collapse " data-bs-parent="#accordionFlushExample">
                                <!-- nav -->
                                <ul class="nav nav-pills nav-pills-light mb-3 nav-fill mt-5" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <!-- button -->
                                        <button class="nav-link active" id="pills-today-tab" data-bs-toggle="pill" data-bs-target="#pills-today" type="button" role="tab" aria-controls="pills-today" aria-selected="true">Tanggal <br><small>Pemesanan</small>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <!-- button -->
                                        <button class="nav-link" id="pills-monday-tab" data-bs-toggle="pill" data-bs-target="#pills-monday" type="button" role="tab" aria-controls="pills-monday" aria-selected="false">Tanggal <br><small>Pengembilan</small>
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <!-- button -->
                                        <button class="nav-link" id="pills-Tue-tab" data-bs-toggle="pill" data-bs-target="#pills-Tue" type="button" role="tab" aria-controls="pills-Tue" aria-selected="false">Tanggal <br><small>Kadaluarsa</small>
                                        </button>
                                    </li>
                                </ul>
                                <!-- tab content -->
                                <div class="tab-content" id="pills-tabContent">
                                    <!-- tab pane -->
                                    <div class="tab-pane fade show active" id="pills-today" role="tabpanel" aria-labelledby="pills-today-tab" tabindex="0">
                                        <div class="mb-12">
                                            <input type="text" class="form-control" value="{{ $transaction->created_at }}" readonly>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-monday" role="tabpanel" aria-labelledby="pills-monday-tab" tabindex="0">
                                        <div class="mb-12">
                                            <input type="text" class="form-control" value="{{ $transaction->tanggal_konfirmasi }}" readonly>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-Tue" role="tabpanel" aria-labelledby="pills-Tue-tab" tabindex="0">
                                        <div class="mb-12">
                                            <input type="text" class="form-control" value="{{ $transaction->tanggal_expired }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- accordion item -->
                        <div class="accordion-item py-4">

                            <a href="#" class="text-inherit h5" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                <i class="feather-icon icon-credit-card me-2 text-muted"></i>Catatan
                                <!-- collapse --> </a>
                            <div id="flush-collapseFour" class="accordion-collapse collapse " data-bs-parent="#accordionFlushExample">
                                <div class="mt-5">
                                    <label for="DeliveryInstructions" class="form-label sr-only">Catatan Customer: </label>
                                    <textarea class="form-control" id="DeliveryInstructions" rows="3" readonly>{{ $transaction->catatan_customer }}</textarea>
                                </div>
                                <div class="mt-5">
                                    <label for="DeliveryInstructions" class="form-label sr-only">Catatan Admin: </label>
                                    <textarea class="form-control" id="DeliveryInstructions" rows="3" readonly>{{ $transaction->catatan_admin }}</textarea>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

                <div class="col-12 col-md-12 offset-lg-1 col-lg-4">
                    <div class="mt-4 mt-lg-0">
                        <div class="card shadow-sm">
                            <h5 class="px-6 py-4 bg-transparent mb-0">Produk</h5>
                            <ul class="list-group list-group-flush">
                                <!-- list group item -->
                                @foreach ($detail as $item)
                                <li class="list-group-item px-4 py-3">
                                    <div class="row align-items-center">
                                        <div class="col-2 col-md-2">
                                            @if(isset($imageArray[$item->product_id]))
                                            <img src="{{ asset('storage/product/' . $imageArray[$item->product_id]->image_path) }}" alt="" class="img-fluid">
                                            @endif
                                        </div>
                                        <div class="col-5 col-md-5">
                                            <h6 class="mb-0">{{ $item->product->nama }}</h6>
                                            <span><small class="text-muted">Rp {{ number_format($item->product->harga, 0, ',', '.') }}</small></span>
                                        </div>
                                        <div class="col-2 col-md-2 text-center text-muted">
                                            <span>{{ $item->jumlah }}</span>
                                        </div>
                                        <div class="col-3 text-lg-end text-start text-md-end col-md-3">
                                            <span class="fw-bold">Rp {{ number_format($item->harga_total, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <!-- list group item -->
                                <li class="list-group-item px-4 py-3">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <div>Total Item</div>
                                        <div class="fw-bold">{{ $transaction->total_item }}</div>
                                    </div>
                                </li>
                                <!-- list group item -->
                                <li class="list-group-item px-4 py-3">
                                    <div class="d-flex align-items-center justify-content-between fw-bold">
                                        <div>Total Harga</div>
                                        <div>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

@endsection