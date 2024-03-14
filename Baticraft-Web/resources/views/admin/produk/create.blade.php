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
                    <center>Tambah Produk</center>
                </h4>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#label-sizing-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        </a>
                    </li>
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="label-sizing-preview">
                        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2 row">
                                <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama Produk">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Deskripsi Produk</label>
                                <div class="col-sm-10">
                                    <input type="texarea" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama Produk">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Kategori</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori" id="kain" value="kain">
                                        <label class="form-check-label" for="kain">Kain</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori" id="kaos" value="kaos">
                                        <label class="form-check-label" for="kaos">Kaos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori" id="kemeja" value="kemeja">
                                        <label class="form-check-label" for="kemeja">Kemeja</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="harga" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="harga" id="harga" placeholder="Harga">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="stok" class="col-sm-2 col-form-label col-form-label-sm">Stok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="stok" id="stok" placeholder="Stok">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="tersedia" value="tersedia">
                                        <label class="form-check-label" for="tersedia">Tersedia</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="tidak-tersedia" value="tidak tersedia">
                                        <label class="form-check-label" for="tidak-tersedia">Tidak Tersedia</label>
                                    </div>
                                </div>
                            </div>

                            <div id="ukuran-section" class="mb-2 row" style="display: none;">
                                <label for="ukuran" class="col-sm-2 col-form-label col-form-label-sm">Ukuran</label>
                                <div class="col-sm-10">
                                    <select class="form-select form-select-sm" name="ukuran" id="ukuran">
                                        <!-- Option ukuran akan ditambahkan melalui JavaScript -->
                                    </select>
                                </div>
                            </div>

                            <div id="jenis-section" class="mb-2 row" style="display: none;">
                                <label for="jenis_lengan" class="col-sm-2 col-form-label col-form-label-sm">Jenis Lengan</label>
                                <div class="col-sm-10">
                                    <select class="form-select form-select-sm" name="jenis_lengan" id="jenis_lengan">
                                        <!-- Option jenis lengan akan ditambahkan melalui JavaScript -->
                                    </select>
                                </div>
                            </div>

                            <div id="kerah-section" class="mb-2 row" style="display: none;">
                                <label for="jenis_kerah" class="col-sm-2 col-form-label col-form-label-sm">Jenis Kerah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="jenis_kerah" id="jenis_kerah" placeholder="Jenis Kerah">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Foto</label>
                                <div class="col-sm-10">
                                    <div class="mb-3">
                                        <!-- Input file tersembunyi -->
                                        <input type="file" id="image" class="form-control" name="image[]" style="display: none;" multiple>
                                        <!-- Area drag and drop -->
                                        <div id="dragDropArea" class="border border-primary rounded p-5">
                                            <p class="text-center text-muted">Drag and drop gambar di sini atau klik untuk memilih</p>
                                        </div>
                                        <!-- Tombol untuk menambahkan gambar baru -->
                                        <button type="button" id="addImageButton" class="btn btn-primary mt-3">Tambah Gambar Baru</button>
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
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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
        const kategoriRadios = document.querySelectorAll('input[name="kategori"]');
        const ukuranSection = document.getElementById('ukuran-section');
        const jenisSection = document.getElementById('jenis-section');
        const kerahSection = document.getElementById('kerah-section');

        // Tampilkan bagian ukuran saat kategori kain dipilih
        kategoriRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (this.value === 'kain') {
                    ukuranSection.style.display = 'block';
                    jenisSection.style.display = 'none';
                    kerahSection.style.display = 'none';
                } else if (this.value === 'kaos') {
                    ukuranSection.style.display = 'none';
                    jenisSection.style.display = 'none';
                    kerahSection.style.display = 'none';
                } else if (this.value === 'kemeja') {
                    ukuranSection.style.display = 'none';
                    jenisSection.style.display = 'block';
                    kerahSection.style.display = 'block';
                }
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dragDropArea = document.getElementById('dragDropArea');
        const imageInput = document.getElementById('image');
        const addImageButton = document.getElementById('addImageButton');

        // Function untuk menampilkan input file ketika tombol tambah gambar ditekan
        addImageButton.addEventListener('click', function() {
            const newImageInput = document.createElement('input');
            newImageInput.setAttribute('type', 'file');
            newImageInput.setAttribute('class', 'form-control mt-3');
            newImageInput.setAttribute('name', 'image[]');
            newImageInput.setAttribute('style', 'display: block;');
            newImageInput.setAttribute('multiple', '');
            imageInput.parentNode.insertBefore(newImageInput, addImageButton);
        });

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
            const files = e.dataTransfer.files;

            // Tampilkan preview gambar jika file adalah gambar
            for (const file of files) {
                if (file.type.match('image.*')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imgElement = document.createElement('img');
                        imgElement.setAttribute('src', e.target.result);
                        imgElement.setAttribute('class', 'img-fluid rounded mt-3');
                        dragDropArea.appendChild(imgElement);
                    }

                    reader.readAsDataURL(file);
                } else {
                    // Tampilkan pesan jika file bukan gambar
                    const textElement = document.createElement('p');
                    textElement.textContent = 'File harus berupa gambar';
                    dragDropArea.appendChild(textElement);
                }
            }
        });

        // Handle klik pada area drag and drop untuk memilih gambar
        dragDropArea.addEventListener('click', function() {
            imageInput.click();
        });

        // Handle perubahan pada input file untuk menampilkan preview gambar
        imageInput.addEventListener('change', function() {
            const files = this.files;

            // Tampilkan preview gambar jika file adalah gambar
            for (const file of files) {
                if (file.type.match('image.*')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const imgElement = document.createElement('img');
                        imgElement.setAttribute('src', e.target.result);
                        imgElement.setAttribute('class', 'img-fluid rounded mt-3');
                        dragDropArea.appendChild(imgElement);
                    }

                    reader.readAsDataURL(file);
                } else {
                    // Tampilkan pesan jika file bukan gambar
                    const textElement = document.createElement('p');
                    textElement.textContent = 'File harus berupa gambar';
                    dragDropArea.appendChild(textElement);
                }
            }
        });
    });
</script>

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