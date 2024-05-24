@extends('admin.layouts.main')
@section ('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index">Produk</a></li>
                    <li class="breadcrumb-item active">Edit Produk</li>
                </ol>
            </div>
            <h4 class="page-title">Edit Produk</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">
                    <center>Edit Produk</center>
                </h4>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#label-sizing-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        </a>
                    </li>
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="label-sizing-preview">
                        <form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Kode Produk -->
                            <div class="mb-2 row">
                                <label for="kode_product" class="col-sm-2 col-form-label col-form-label-sm">Kode Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kode_product" id="kode_product" value="{{ $data->kode_product }}" class="form-control" readonly>
                                    @error('kode_product')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Nama Produk -->
                            <div class="mb-2 row">
                                <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama" value="{{ $data->nama }}" placeholder="Nama Produk">
                                    @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Deskripsi Produk -->
                            <div class="mb-2 row">
                                <label for="deskripsi" class="col-sm-2 col-form-label col-form-label-sm">Deskripsi Produk</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi Produk">{{ $data->deskripsi }}</textarea>
                                    @error('deskripsi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Harga -->
                            <div class="mb-2 row">
                                <label for="harga" class="col-sm-2 col-form-label col-form-label-sm">Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="harga" id="harga" value="{{ $data->harga }}" placeholder="Harga">
                                    @error('harga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Stok -->
                            <div class="mb-2 row">
                                <label for="stok" class="col-sm-2 col-form-label col-form-label-sm">Stok</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control form-control-sm" value="{{ $data->stok }}" name="stok" id="stok" placeholder="Stok" min="0">
                                    @error('stok')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Bahan -->
                            <div class="mb-2 row">
                                <label for="bahan" class="col-sm-2 col-form-label col-form-label-sm">Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="bahan" id="bahan" value="{{ $data->bahan }}" placeholder="Bahan">
                                    @error('bahan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Jenis Batik -->
                            <div class="mb-2 row">
                                <label for="jenis_batik" class="col-sm-2 col-form-label col-form-label-sm">Jenis Batik</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jenis_batik" id="jenis_batik" value="{{ $data->jenis_batik }}" placeholder="Jenis Batik">
                                    @error('jenis_batik')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="tersedia" value="tersedia" {{ $data->status == 'tersedia' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tersedia">Tersedia</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="tidak-tersedia" value="tidak tersedia" {{ $data->status == 'tidak tersedia' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tidak-tersedia">Tidak Tersedia</label>
                                    </div>
                                    @error('status')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Kategori -->
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Kategori</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori" id="kain" value="kain" {{ $data->kategori == 'kain' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="kain">Kain</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori" id="kaos" value="kaos" {{ $data->kategori == 'kaos' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="kaos">Kaos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="kategori" id="kemeja" value="kemeja" {{ $data->kategori == 'kemeja' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="kemeja">Kemeja</label>
                                    </div>
                                    @error('kategori')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Ukuran -->
                            <div class="mb-2 row">
                                <label for="ukuran" class="col-sm-2 col-form-label col-form-label-sm">Ukuran</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ukuran" id="ukuran" value="{{ $data->ukuran }}" placeholder="Ukuran">
                                    @error('ukuran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Panjang Kain -->
                            <div class="mb-2 row">
                                <label for="panjang_kain" class="col-sm-2 col-form-label col-form-label-sm">Panjang Kain</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="panjang_kain" id="panjang_kain" value="{{ $data->panjang_kain }}" placeholder="Panjang Kain">
                                    @error('panjang_kain')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Lebar Kain -->
                            <div class="mb-2 row">
                                <label for="lebar_kain" class="col-sm-2 col-form-label col-form-label-sm">Lebar Kain</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="lebar_kain" id="lebar_kain" value="{{ $data->lebar_kain }}" placeholder="Lebar Kain">
                                    @error('lebar_kain')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Jenis Lengan -->
                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label col-form-label-sm">Jenis Lengan</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_lengan" id="panjang" value="panjang" {{ $data->jenis_lengan == 'panjang' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="panjang">Panjang</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_lengan" id="pendek" value="pendek" {{ $data->jenis_lengan == 'pendek' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pendek">Pendek</label>
                                    </div>
                                    @error('jenis_lengan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="gambar" class="col-sm-2 col-form-label col-form-label-sm">Gambar Produk</label>
                                <div class="col-sm-10">
                                    @if($images->isNotEmpty())
                                    @foreach($images as $image)
                                    <img src="{{ asset('storage/product/' . $image->image_path) }}" alt="Gambar Produk" class="img-thumbnail mb-2">
                                    @endforeach
                                    @else
                                    <p>Tidak ada gambar produk.</p>
                                    @endif
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Foto</label>
                                <div class="col-sm-10">
                                    <div class="mb-3" id="imageInputs">
                                        <!-- Input gambar pertama -->
                                        <input type="file" name="images[]" class="form-control">
                                    </div>
                                </div>
                            </div>


                            <!-- Tombol Simpan -->
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
<!-- Stok dan Status -->
<script>
    // Function to update status based on stock value
    function updateStatus() {
        var stok = parseInt(document.getElementById('stok').value);
        var statusInput = document.querySelector('input[name="status"]');
        if (stok === 0) {
            statusInput.value = 'tidak tersedia';
        } else {
            statusInput.value = 'tersedia';
        }
    }

    // Call the function when the page loads
    window.addEventListener('load', function() {
        updateStatus();
    });

    // Call the function when stock input changes
    document.getElementById('stok').addEventListener('change', function() {
        updateStatus();
    });
</script>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const imageInputsContainer = document.getElementById('imageInputs');
        const addImageButton = document.getElementById('addImageButton');
        const maxImages = 5; 

        let imageCount = 0; 

        addImageButton.addEventListener('click', function() {
            if (imageCount < maxImages) {
                const newInput = document.createElement('div');
                newInput.className = 'mb-2';
                newInput.innerHTML = `
          <input type="file" name="edited_images[]" class="form-control mt-2">
        `;
                imageInputsContainer.appendChild(newInput);
                imageCount++;
            } else {
                alert('Maksimal jumlah gambar telah tercapai.');
            }
        });
    });
</script> -->
@endsection