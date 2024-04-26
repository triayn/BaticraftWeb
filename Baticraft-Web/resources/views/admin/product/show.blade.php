@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Produk / <a href="javascript: void(0);">Detail Produk</a></li>
                </ol>
            </div>
            <h4 class="page-title">Produk</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5">
                        <!-- Product image -->
                        <a href="javascript: void(0);" class="text-center d-block mb-4">
                            <img src="{{ asset('assets/customer/images/login.png') }}" class="img-fluid" style="max-width: 280px;" alt="Product-img" />
                        </a>

                        <div class="d-lg-flex d-none justify-content-center">
                            <a href="javascript: void(0);">
                                <img src="{{ asset('assets/customer/images/login.png') }}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                            </a>
                            <a href="javascript: void(0);" class="ms-2">
                                <img src="{{ asset('assets/customer/images/login.png') }}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                            </a>
                            <a href="javascript: void(0);" class="ms-2">
                                <img src="{{ asset('assets/customer/images/login.png') }}" class="img-fluid img-thumbnail p-2" style="max-width: 75px;" alt="Product-img" />
                            </a>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-lg-7">
                        <form class="ps-lg-4">
                            <!-- Product title -->
                            <h3 class="mt-0">{{ $data->nama }} </h3>
                            <p class="mb-1">{{ $data->kode_product }}</p>

                            <!-- Product stock -->
                            <div class="mt-3">
                                <h4><span class="badge badge-success-lighten">
                                        @if($data->status == 'tersedia')
                                        <span class="badge badge-success-lighten p-1 font-14">{{ $data->status }}</span>
                                        @else($data->status == 'tidak tersedia')
                                        <span class="badge badge-danger-lighten p-1 font-14">{{ $data->status }}</span>
                                        @endif
                                    </span>
                                </h4>
                            </div>

                            <!-- Product description -->
                            <div class="mt-4">
                                <h6 class="font-14">Harga:</h6>
                                <h3> Rp {{ $data->harga }},00</h3>
                            </div>

                            <!-- Product description -->
                            <div class="mt-4">
                                <h6 class="font-14">Deskripsi:</h6>
                                <p>{{ $data->deskripsi }} </p>
                            </div>

                            <!-- Product information -->
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h6 class="font-14">Stok:</h6>
                                        <p class="text-sm lh-150">{{ $data->stok }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="font-14">Kategori:</h6>
                                        <p class="text-sm lh-150">{{ $data->kategori }}</p>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div> <!-- end col -->
                </div> <!-- end row-->

                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-centered mb-0">
                        <thead>
                            <!-- <tr>
                                <th>Outlets</th>
                                <th>Price</th>
                            </tr> -->
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ukuran</td>
                                <td>{{ $data->ukuran }}</td>
                            </tr>
                            <tr>
                                <td>Bahan</td>
                                <td>{{ $data->bahan }}</td>
                            </tr>
                            <tr>
                                <td>Panjang Kain</td>
                                <td>{{ $data->panjang_kain }}</td>
                            </tr>
                            <tr>
                                <td>Lebar Kain</td>
                                <td>{{ $data->lebar_kain }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Batik</td>
                                <td>{{ $data->jenis_batik  }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Lengan</td>
                                <td>{{ $data->jenis_lengan }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->

            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
@endsection