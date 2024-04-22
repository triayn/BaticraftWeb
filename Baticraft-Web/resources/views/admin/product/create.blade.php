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
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2 row">
                                <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Kode Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kode_product" id="kode_product" value="{{ $nextProductId }}" class="form-control" readonly>
                                </div>
                            </div>


                            <div class="mb-2 row">
                                <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Nama Produk">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Deskripsi Produk</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="Deskripsi Produk" name="deskripsi" id="deskripsi" style="height: 100px;"></textarea>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="harga" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
                                <div class="col-auto">
                                    <label class="visually-hidden" for="inlineFormInputGroup">Harga</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-text">Rp. </div>
                                        <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="stok" class="col-sm-2 col-form-label col-form-label-sm">Stok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="stok" id="stok" placeholder="Stok">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="bahan" class="col-sm-2 col-form-label col-form-label-sm">Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="bahan" id="bahan" placeholder="Bahan">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="jenis_batik" class="col-sm-2 col-form-label col-form-label-sm">Jenis Batik</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="jenis_batik" id="jenis_batik" placeholder="Jenis Batik">
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
                                <label for="ukuran" class="col-sm-2 col-form-label col-form-label-sm">Ukuran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="ukuran" id="ukuran" placeholder="Ukuran">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="panjang_kain" class="col-sm-2 col-form-label col-form-label-sm">Panjang Kain</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="panjang_kain" id="panjang_kain" placeholder="Panjang Kain">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="lebar_kain" class="col-sm-2 col-form-label col-form-label-sm">Lebar Kain</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-sm" name="lebar_kain" id="lebar_kain" placeholder="Lebar Kain">
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Jenis Lengan</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_lengan" id="panjang" value="panjang">
                                        <label class="form-check-label" for="panjang">Panjang</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_lengan" id="pendek" value="pendek">
                                        <label class="form-check-label" for="pendek">Pendek</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Foto</label>
                                <div class="col-sm-10">
                                    <div class="mb-3">
                                        <input type="file" id="image" class="form-control" name="image[]" style="display: none;" multiple>
                                        <button type="button" id="addImageButton" class="btn btn-primary mt-3">Tambah Gambar</button>
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
<!-- Ketegori Produk -->

<!-- Tmabh Gambar -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dragDropArea = document.getElementById('dragDropArea');
        const imageInput = document.getElementById('image');
        const addImageButton = document.getElementById('addImageButton');
        const MAX_IMAGES = 5;

        // Function untuk menampilkan input file ketika tombol tambah gambar ditekan
        addImageButton.addEventListener('click', function() {
            // Jika sudah mencapai jumlah maksimal gambar, hentikan fungsi
            if (document.querySelectorAll('.img-fluid').length >= MAX_IMAGES) {
                alert('Maksimal 5 gambar sudah tercapai');
                return;
            }

            // Menghitung jumlah gambar yang akan ditambahkan
            const remainingImages = MAX_IMAGES - document.querySelectorAll('.img-fluid').length;

            // Membuat input file sebanyak sisa gambar yang dapat ditambahkan
            for (let i = 0; i < remainingImages; i++) {
                const newImageInput = document.createElement('input');
                newImageInput.setAttribute('type', 'file');
                newImageInput.setAttribute('class', 'form-control mt-3');
                newImageInput.setAttribute('name', 'image[]');
                newImageInput.setAttribute('style', 'display: block;');
                newImageInput.setAttribute('multiple', '');
                imageInput.parentNode.insertBefore(newImageInput, addImageButton);
            }
        });

        // Prevent default behavior saat file dijatuhkan pada area drag and drop
        dragDropArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            dragDropArea.classList.add('border-primary');
        });
    });
</script>
@endsection