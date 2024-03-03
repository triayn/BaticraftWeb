@extends('admin.layouts.main')
@section ('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index">Pengguna</a></li>
                    <li class="breadcrumb-item active">Detail Data Pengguna</li>
                </ol>
            </div>
            <h4 class="page-title">Detail Data Pengguna</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="mt-3">
                    <hr class="" />

                    <p class="mt-4 mb-1"><strong><i class='uil uil-envelope-add me-1'></i> Email:</strong></p>
                    <p>{{ $data->email }}</p>

                    <p class="mt-3 mb-1"><strong><i class='uil uil-phone'></i> Nomor Handphone:</strong></p>
                    <p>{{ $data->no_telpon }}</p>

                    <p class="mt-3 mb-1"><strong><i class='uil uil-location'></i> Alamat:</strong></p>
                    <p>{{ $data->alamat }}</p>

                    <p class="mt-3 mb-1"><strong><i class='uil uil-globe'></i> Tempat, Tanggal Lahir:</strong></p>
                    <p>{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}</p>

                    <p class="mt-3 mb-2"><strong><i class='uil uil-users-alt'></i> Jenis Kelamin:</strong></p>
                    <p>
                        @if($data->jenis_kelamin == 'Laki-laki')
                        <span class="badge badge-success-lighten p-1 font-14">{{ $data->jenis_kelamin }}</span>
                        @else($data->jenis_kelamin == 'Perempuan')
                        <span class="badge badge-primary-lighten p-1 font-14">{{ $data->jenis_kelamin }}</span>
                        @endif
                    </p>
                </div>
            </div> <!-- end card-body -->
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">
                <div class="mt-3 text-center">
                    <img src="{{ asset('storage/user/' .$data->image) }}" class="img-thumbnail avatar-lg 
                    rounded-circle" />
                    <h4>{{ $data->nama }}</h4>
                    <button class="btn btn-info btn-sm mt-1"><i class='uil uil-at'></i> {{ $data->role }}</button>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection