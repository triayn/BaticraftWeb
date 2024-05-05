@extends('customer.layouts.main')
@section('content')
<section class="mt-8">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- img slide -->
                <div class="product" id="product">
                    @if($images->isNotEmpty())
                    <div class="zoom" onmousemove="zoom(event)">
                        <!-- img -->
                        <img src="{{ asset('storage/product/' . $images[0]->image_path) }}" alt="">
                    </div>
                    @endif
                </div>
                <!-- product tools -->
                @foreach($images as $image)
                <div class="product-tools">
                    <div class="thumbnails row g-3" id="productThumbnails">
                        <div class="col-3">
                            <div class="thumbnails-img">
                                <!-- img -->
                                <img src="{{ asset('storage/product/' . $image->image_path) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <div class="ps-lg-10">
                    <!-- content -->
                    <a href="#!" class="mb-4 d-block">{{ $data->kategori }}</a>
                    <!-- heading -->
                    <h1 class="mb-1">{{ $data->nama }} </h1>
                    <div class="fs-4">
                        <!-- price --><span class="fw-bold text-dark">Rp {{ number_format($data->harga, 0, ',', '.') }}</span>
                    </div>
                    <!-- hr -->
                    <hr class="my-6">
                    <div class="mt-5 d-flex justify-content-start">
                        <!-- <div class="col-lg-2 col-3 ">
                            <div class="input-group  flex-nowrap justify-content-center ">
                                <input type="button" value="-" class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  " data-field="quantity">
                                <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                                <input type="button" value="+" class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  " data-field="quantity">
                            </div>
                        </div> -->
                        <div class="ms-2 col-lg-8 col-5 d-grid">
                            <form action="{{ route('keranjang.add') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $data->id }}"> <!-- Ganti dengan ID produk yang sesuai -->
                                <input type="hidden" name="jumlah" value="1"> <!-- Ganti dengan jumlah produk yang ingin ditambahkan -->
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather-icon icon-shopping-bag me-2"></i>Masukkan Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- hr -->
                    <hr class="my-6">
                    <div>
                        <!-- table -->
                        <table class="table table-borderless">

                            <tbody>
                                <tr>
                                    <td>Kode Produk:</td>
                                    <td>{{ $data->kode_product }}</td>
                                </tr>
                                <tr>
                                    <td>Stok:</td>
                                    <td>{{ $data->stok }} pcs</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-lg-14 mt-8 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                    <!-- nav item -->
                    <li class="nav-item" role="presentation">
                        <!-- btn --> <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true">Detail Produk</button>
                    </li>
                    <!-- nav item -->
                    <li class="nav-item" role="presentation">
                        <!-- btn --> <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Informasi</button>
                    </li>
                </ul>
                <!-- tab content -->
                <div class="tab-content" id="myTabContent">
                    <!-- tab pane -->
                    <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                        <div class="my-8 col-lg-6">
                            <div class="mb-5">
                                <!-- text -->
                                <h4 class="mb-1">Deskripsi:</h4>
                                <p class="mb-0">{{ $data->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- tab pane -->
                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="my-8">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="mb-4">Detail</h4>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <table class="table table-striped">
                                        <!-- table -->
                                        <tbody>
                                            <tr>
                                                <th>Jenis Batik</th>
                                                <td>{{ $data->jenis_batik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ukuran</th>
                                                <td>{{ $data->ukuran }}</td>
                                            </tr>
                                            <tr>
                                                <th>Bahan</th>
                                                <td>{{ $data->bahan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Panjang Kain</th>
                                                <td>{{ $data->panjang_kain }}</td>
                                            </tr>
                                            <tr>
                                                <th>Lebar Kain</th>
                                                <td>{{ $data->lebar_kain }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Lengan</th>
                                                <td>{{ $data->jenis_lengan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection