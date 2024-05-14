@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Pesanan / <a href="javascript: void(0);">Pesanan Diproses</a></li>
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
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $satu->nama_product }}</td>
                                <td>Rp {{ number_format($satu->product->harga, 0, ',', '.') }}</td>
                                <td>{{ $satu->jumlah }}</td>
                                <td>Rp {{ number_format($satu->harga_total, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- end table-responsive -->

            </div>
        </div>
    </div>
    <!-- end col -->

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
                <h4 class="header-title mb-3">Informasi Pemesan</h4>

                <h5>{{ $transaction->user->nama }}</h5>

                <address class="mb-0 font-14 address-lg">
                    {{ $transaction->user->alamat }}<br>
                    <abbr title="Phone">No. Handphone:</abbr> {{ $transaction->user->no_telpon }} <br />
                    <abbr title="Mobile">Email:</abbr> {{ $transaction->user->email }}
                </address>
                <p class="mb-0"><b>Note Customer :</b> {{ $transaction->catatan_customer }}</p>
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
                    <p class="mb-0"><b>Jenis Transaksi :</b> {{ $transaction->jenis_transaksi }}</p>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>

<div class="row" style="margin-bottom: 15px;">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">
        <i class="mdi mdi-square-edit-outline ms-2"></i>Pesanan Sudah Selesai?
    </button>
</div>

<!-- Modal Konfirmasi Pesanan Diterima -->
<div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Pesanan Diterima</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('konfirmasi.selesai') }}" method="POST">
                    @csrf
                    <input type="hidden" name="idTransaksi" value="{{ $transaction->id }}"> <!-- Ganti $pesanan->id dengan ID pesanan yang ingin dikonfirmasi -->
                    <div class="mb-3">
                        <label for="tanggalPengambilan" class="form-label">Kasir</label>
                        <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPengambilan" class="form-label">Apakah anda yakin pesanan ini sudah selesai?</label>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalKadaluarsa" class="form-label">Hari ini</label>
                        <input type="datetime-local" class="form-control" id="tanggalKadaluarsa" name="tanggalKadaluarsa" value="{{ date('Y-m-d\TH:i') }}" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')

@endsection