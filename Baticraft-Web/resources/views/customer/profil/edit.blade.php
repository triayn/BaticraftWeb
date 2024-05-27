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
                                <form action="{{ route('profil.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- input -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="nama" value="{{ $user->nama }}">
                                        @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- input -->
                                    <div class="mb-5">
                                        <label for="no_telpon" class="form-label">No. Handphone</label>
                                        <input type="text" class="form-control" id="no_telpon" name="no_telpon" value="{{ $user->no_telpon }}">
                                        @error('no_telpon')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat" rows="4">{{ $user->alamat }}</textarea>
                                        @error('alamat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $user->tempat_lahir }}">
                                        @error('tempat_lahir')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}">
                                        @error('tanggal_lahir')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                        <div>
                                            <input type="radio" id="laki-laki" name="jenis_kelamin" value="laki-laki" {{ $user->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                            <label for="laki-laki">Laki-laki</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan" {{ $user->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                            <label for="perempuan">Perempuan</label>
                                        </div>
                                        @error('jenis_kelamin')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-5">
                                        <label for="image" class="form-label">Foto</label>
                                        <input type="file" id="image" class="form-control" name="image" style="display: none;">
                                        <div id="dragDropArea" class="border border-primary rounded p-5">
                                            <p class="text-center text-muted">Drag and drop gambar di sini atau klik untuk memilih</p>
                                        </div>
                                        @error('image')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- button -->
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    @if (session('success'))
        var successModal = new bootstrap.Modal(document.getElementById('success-alert-modal'));
        successModal.show();
    @endif
});
</script>
@endsection