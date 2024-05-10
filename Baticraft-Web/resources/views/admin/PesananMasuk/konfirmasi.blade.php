@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Pesanan / <a href="javascript: void(0);">Pesanan Masuk</a></li>
                </ol>
            </div>
            <h4 class="page-title">Pesanan</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Produk</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach ($detail as $satu)
                            @foreach ($produk as $dua)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $dua->nama }}</td>
                                <td>Rp {{ number_format($dua->harga, 0, ',', '.') }}</td>
                                <td>{{ $satu->jumlah }}</td>
                                <td>Rp {{ number_format($satu->harga_total, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Detail Pesanan</h4>

                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                            <!-- <tr>
                                <th>Description</th>
                                <th>Price</th>
                            </tr> -->
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Item :</td>
                                <td>{{ $transaction->total_item }}</td>
                            </tr>
                            <tr>
                                <td>Total harga :</td>
                                <td>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->

            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->


<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Informasi Pesanan</h4>

                <h5>{{ $transaction->user->nama }}</h5>

                <address class="mb-0 font-14 address-lg">
                    {{ $transaction->user->alamat }}<br>
                    <abbr title="Phone">No. Handphone:</abbr> {{ $transaction->user->no_telpon }} <br />
                    <abbr title="Mobile">Email:</abbr> {{ $transaction->user->email }}
                </address>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Tanggal Pesanan</h4>

                <ul class="list-unstyled mb-0">
                    <li>
                        <p class="mb-2"><span class="fw-bold me-2">Tanggal Pemesan: <br> </span> {{ $transaction->created_at }}</p>
                        <p class="mb-2"><span class="fw-bold me-2">Tanggal Pengambilan: <br> </span> {{ $transaction->tanggal_konfirmasi }}</p>
                        <p class="mb-2"><span class="fw-bold me-2">Tanggal Kadaluarsa: <br> </span> {{ $transaction->tanggal_expired }}</p>
                    </li>
                </ul>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-3">Informasi Pesanan</h4>

                <div class="text-center">
                    <i class="mdi mdi-truck-fast h2 text-muted"></i>
                    <h5><b>Pesanan</b></h5>
                    <p class="mb-1"><b>Kode :</b> {{ $transaction->kode_transaksi }}</p>
                    <p class="mb-0"><b>Status :</b> {{ $transaction->status_transaksi }}</p>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="row">
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#konfirmasiPesanan">
        <i class="mdi mdi-square-edit-outline ms-2"></i>Konfirmasi Pesanan
    </button>
</div>


<!-- Modal Konfirmasi Pesanan -->
<div id="konfirmasiPesanan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="konfirmasiPesananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="konfirmasiPesananModalLabel">Konfirmasi Pesanan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="statusPesanan" class="form-label">Status Pesanan</label>
                    <select class="form-select" id="statusPesanan">
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>
                <div id="alasanTolak" class="mb-3" style="display: none;">
                    <label for="alasan" class="form-label">Alasan Penolakan</label>
                    <textarea class="form-control" id="alasan" rows="3"></textarea>
                </div>
                <div id="tanggalPengambilan" class="mb-3" style="display: none;">
                    <label for="tanggalAmbil" class="form-label">Tanggal Pengambilan Barang</label>
                    <input type="date" class="form-control" id="tanggalAmbil">
                </div>
                <div id="tanggalKadaluarsa" class="mb-3" style="display: none;">
                    <label for="tanggalKadaluarsa" class="form-label">Tanggal Kadaluarsa Pengambilan Barang</label>
                    <input type="date" class="form-control" id="tanggalKadaluarsa">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="prosesKonfirmasi()">Konfirmasi</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Fungsi untuk menampilkan atau menyembunyikan inputan berdasarkan status pesanan
    function tampilkanInputan() {
        var statusPesanan = document.getElementById('statusPesanan').value;
        var alasanTolak = document.getElementById('alasanTolak');
        var tanggalPengambilan = document.getElementById('tanggalPengambilan');
        var tanggalKadaluarsa = document.getElementById('tanggalKadaluarsa');

        if (statusPesanan === 'ditolak') {
            alasanTolak.style.display = 'block';
            tanggalPengambilan.style.display = 'none';
            tanggalKadaluarsa.style.display = 'none';
        } else if (statusPesanan === 'diterima') {
            alasanTolak.style.display = 'none';
            tanggalPengambilan.style.display = 'block';
            tanggalKadaluarsa.style.display = 'block';
        }
    }

    // Panggil fungsi tampilkanInputan saat halaman dimuat
    window.onload = function() {
        tampilkanInputan();
    };

    // Fungsi untuk memproses konfirmasi pesanan
    function prosesKonfirmasi() {
        var statusPesanan = document.getElementById('statusPesanan').value;
        var alasan = document.getElementById('alasan').value;
        var tanggalAmbil = document.getElementById('tanggalAmbil').value;
        var tanggalKadaluarsa = document.getElementById('tanggalKadaluarsa').value;

        // Lakukan validasi atau proses sesuai kebutuhan Anda
        console.log('Status Pesanan:', statusPesanan);
        console.log('Alasan:', alasan);
        console.log('Tanggal Pengambilan:', tanggalAmbil);
        console.log('Tanggal Kadaluarsa:', tanggalKadaluarsa);

        // Setelah validasi atau proses, bisa melakukan aksi selanjutnya seperti mengirim data ke server, dll.
    }
</script>
@endsection