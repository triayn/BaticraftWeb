@extends('customer.layouts.main')

@section('content')
<!-- section -->
<section>
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <div class="p-6 d-flex justify-content-between align-items-center d-md-none">
                    <!-- heading -->
                    <h3 class="fs-5 mb-0">Account Setting</h3>
                    <!-- btn -->
                    <button class="btn btn-outline-gray-400 text-muted d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                        <i class="feather-icon icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- col -->
            <div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
                <div class="pt-10 pe-lg-10">
                    <!-- nav item -->
                    <ul class="nav flex-column nav-pills nav-pills-dark">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="{{ route('profil.cutomer') }}"><i class="feather-icon icon-shopping-bag me-2"></i>Profil</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profil.customer.edit') }}"><i class="feather-icon icon-settings me-2"></i>Edit Profil</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profil.customer.ganti') }}"><i class="feather-icon icon-key me-2"></i>Ganti Kata Sandi</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <hr>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="feather-icon icon-log-out me-2"></i>Keluar</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="p-6 p-lg-10">
                    <div class="mb-6">
                        <!-- heading -->
                        <h2 class="mb-0">Edit Profil</h2>
                    </div>
                    <div>
                        <!-- heading -->
                        <!-- <h5 class="mb-4">Account details</h5> -->
                        <div class="row">
                            <div class="col-lg-10">
                                <!-- form -->
                                <form action="{{ route('profil.customer.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- input -->
                                    <div class="mb-3">
                                        <label class="form-label" for="nama">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $user->nama) }}">
                                        @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- input -->
                                    <div class="mb-5">
                                        <label class="form-label" for="no_telpon">No. Handphone</label>
                                        <input type="text" class="form-control @error('no_telpon') is-invalid @enderror" id="no_telpon" name="no_telpon" value="{{ old('no_telpon', $user->no_telpon) }}">
                                        @error('no_telpon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label class="form-label" for="alamat">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}">
                                        @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio1" name="jenis_kelamin" value="Laki-laki" class="form-check-input" {{ $user->jenis_kelamin === 'Laki-laki' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="customRadio1">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" id="customRadio2" name="jenis_kelamin" value="Perempuan" class="form-check-input" {{ $user->jenis_kelamin === 'Perempuan' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="customRadio2">Perempuan</label>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
                                        @error('tempat_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label class="form-label" for="tanggal_lahir">Foto</label>
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

                                    <!-- button -->
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Edit Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
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