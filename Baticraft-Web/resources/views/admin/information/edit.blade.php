@extends('admin.layouts.main')
@section ('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index">Informasi Toko</a></li>
                    <li class="breadcrumb-item active">Edit Informasi</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Informasi Toko</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">
                    <center>Edit Data</center>
                </h4>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#label-sizing-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        </a>
                    </li>
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="label-sizing-preview">
                        <form action="{{ route('information.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama Pemilik</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('nama_pemilik') is-invalid @enderror" value="{{ old('nama_pemilik', $data->nama_pemilik) }}" name="nama_pemilik" id="colFormLabelSm" placeholder="Nama Pemilik">
                                    @error('nama_pemilik')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama Toko</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('nama_toko') is-invalid @enderror" value="{{ old('nama_toko', $data->nama_toko) }}" name="nama_toko" id="colFormLabelSm" placeholder="Nama Toko">
                                    @error('nama_toko')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat" value="{{ $data->alamat }}" id="colFormLabelSm" placeholder="Alamat">
                                    @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ $data->lokasi }}" id="colFormLabelSm" placeholder="Masukkan Link Google Maps">
                                    @error('lokasi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="deskripsi" class="col-sm-2 col-form-label col-form-label-sm">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control form-control-sm @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" name="deskripsi" id="deskripsi" style="height: 100px;">{{ $data->deskripsi }}</textarea>
                                    @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No. Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('no_telpon') is-invalid @enderror" value="{{ $data->no_telpon }}" name="no_telpon" id="colFormLabelSm" placeholder="No. Telepon">
                                    @error('no_telpon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" id="colFormLabelSm" placeholder="example@gmail.com">
                                    @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Akun Instagram</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('akun_ig') is-invalid @enderror" value="{{ $data->akun_ig }}" name="akun_ig" id="colFormLabelSm" placeholder="Akun Instagram">
                                    @error('akun_ig')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Akun Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" name="akun_fb" class="form-control @error('akun_fb') is-invalid @enderror" id="example-date" value="{{ $data->akun_fb }}" placeholder="Akun Facebook">
                                    @error('akun_fb')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Akun Tiktok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('akun_tiktok') is-invalid @enderror" placeholder="Akun Tiktok" name="akun_tiktok" id="example-date" value="{{ $data->akun_tiktok }}">
                                    @error('akun_tiktok')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Foto</label>
                                <div class="col-sm-10">
                                    <div class="mb-3">
                                        <!-- Menampilkan gambar sebelumnya -->
                                        @if(isset($data->image))
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/information/' . $data->image) }}" alt="Gambar Sebelumnya" class="img-fluid" style="max-height: 200px;">
                                        </div>
                                        @endif
                                        <!-- Input file tersembunyi -->
                                        <input type="file" id="image" class="form-control" name="image" style="display: none;">
                                        <!-- Area drag and drop -->
                                        <div id="dragDropArea" class="border border-primary rounded p-5" onclick="document.getElementById('image').click();">
                                            <p class="text-center text-muted">Drag and drop gambar di sini atau klik untuk memilih</p>
                                        </div>
                                        <!-- Pesan error -->
                                        @error('image')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Edit Data</button>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dragDropArea = document.getElementById('dragDropArea');
        const imageInput = document.getElementById('image');

        // Prevent default behavior saat file dijatuhkan pada area drag and drop
        dragDropArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            dragDropArea.classList.add('border-primary');
        });

        // Remove border saat file tidak lagi dijatuhkan
        dragDropArea.addEventListener('dragleave', function() {
            dragDropArea.classList.remove('border-primary');
        });

        // Handle file saat dijatuhkan pada area drag and drop
        dragDropArea.addEventListener('drop', function(e) {
            e.preventDefault();
            dragDropArea.classList.remove('border-primary');

            // Ambil file yang dijatuhkan
            const file = e.dataTransfer.files[0];

            // Simpan file ke dalam input file
            imageInput.files = e.dataTransfer.files;

            // Tampilkan preview gambar jika file adalah gambar
            if (file.type.match('image.*')) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    dragDropArea.innerHTML = '<img src="' + e.target.result + '" class="img-fluid rounded">';
                }

                reader.readAsDataURL(file);
            } else {
                dragDropArea.innerHTML = '<p class="text-center text-muted">File harus berupa gambar</p>';
            }
        });

        // Handle klik pada area drag and drop untuk memilih gambar
        dragDropArea.addEventListener('click', function() {
            imageInput.click();
        });

        // Handle perubahan pada input file untuk menampilkan preview gambar
        imageInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    dragDropArea.innerHTML = '<img src="' + e.target.result + '" class="img-fluid rounded">';
                }

                reader.readAsDataURL(file);
            }
        });
    });
</script>
@endsection