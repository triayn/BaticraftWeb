@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Informasi Toko</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            @foreach ($data as $row)
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5">
                        <!-- Product image -->
                        <a href="javascript: void(0);" class="text-center d-block mb-4">
                            <img src="{{ asset('assets/customer/images/login.png') }}" class="img-fluid" style="max-width: 280px;" alt="Product-img" />
                        </a>
                    </div> <!-- end col -->
                    <div class="col-lg-7">
                        <form class="ps-lg-4">
                            <!-- Product title -->
                            <h3 class="mt-0"> {{ $row->nama_toko }} <a href="{{ route('information.edit) }}" class="text-muted"><i class="mdi mdi-square-edit-outline ms-2"></i></a> </h3>

                            <!-- Product description -->
                            <div class="mt-4">
                                <h6 class="font-14">Pemilik </h6>
                                <h3> {{ $row->nama_pemilik }}</h3>
                            </div>

                            <!-- Product description -->
                            <div class="mt-4">
                                <h6 class="font-14">Deskripsi :</h6>
                                <p>{{ $row->deskripsi }} </p>
                            </div>

                            <!-- Product information -->
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="font-14">Nomor Handphone:</h6>
                                        <p class="text-sm lh-150">{{ $row->no_telpon }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="font-14">Email:</h6>
                                        <p class="text-sm lh-150">{{ $row->email }}</p>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div> <!-- end col -->
                </div> <!-- end row-->

                <h6 class="font-14">Akun Sosial Media:</h6>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered table-centered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Instagram</th>
                                <th>Facebook</th>
                                <th>Tiktok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $row->akun_ig }}</td>
                                <td>{{ $row->akun_fb }}</td>
                                <td>{{ $row->akun_tiktok }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->

                <div class="row">
                    <div class="col-xl-12" style="margin-top: 30px;">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-3">Google Map</h4>
                                <!-- Tautan langsung ke Google Maps -->
                                <a href="{{ $row->lokasi }}" target="_blank">Lihat Lokasi di Google Maps</a>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div>
                </div>


            </div> <!-- end card-body-->
            @endforeach
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
@endsection