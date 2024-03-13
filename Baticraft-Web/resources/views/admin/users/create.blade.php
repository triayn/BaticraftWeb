@extends('admin.layouts.main')
@section ('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index">Pengguna</a></li>
                    <li class="breadcrumb-item active">Tambah Pengguna</li>
                </ol>
            </div>
            <h4 class="page-title">Tambah Pengguna</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">
                    <center>Tambah Pengguna</center>
                </h4>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#label-sizing-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        </a>
                    </li>
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="label-sizing-preview">
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('nama') is-invalid @enderror" name="nama" id="colFormLabelSm" placeholder="Nama Lengkap">
                                    @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nomor</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('no_telpon') is-invalid @enderror" name="no_telpon" id="colFormLabelSm" placeholder="No. Telepon">
                                    @error('no_telpon')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('alamat') is-invalid @enderror" name="alamat" id="colFormLabelSm" placeholder="Alamat">
                                    @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="jenis_kelamin" value="Laki-laki" class="form-check-input">
                                        <label class="form-check-label" for="customRadio1">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="customRadio2" name="jenis_kelamin" value="Perempuan" class="form-check-input">
                                        <label class="form-check-label" for="customRadio2">Perempuan</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="colFormLabelSm" placeholder="Tempat Lahir">
                                    @error('tempat_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="example-date">
                                    @error('tanggal_lahir')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Role</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="role" value="admin" class="form-check-input">
                                        <label class="form-check-label" for="customRadio1">Admin</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" id="colFormLabelSm" placeholder="example@gmail.com">
                                    @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('password')
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
                                        <!-- Input file tersembunyi -->
                                        <input type="file" id="image" class="form-control" name="image" style="display: none;">
                                        <!-- Area drag and drop -->
                                        <div id="dragDropArea" class="border border-primary rounded p-5">
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
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
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