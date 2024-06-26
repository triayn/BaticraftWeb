@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Pesanan / <a href="javascript: void(0);">Pesanan Riwayat</a></li>
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

<!-- Button untuk pesanan diterima -->
<div class="row" style="margin-bottom: 15px;">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">
        <i class="mdi mdi-square-edit-outline ms-2"></i>Pesanan Diterima
    </button>
</div>
<!-- Button untuk pesanan ditolak -->
<div class="row">
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#penolakanModal">
        <i class="mdi mdi-square-edit-outline ms-2"></i>Pesanan Ditolak
    </button>
</div>

<!-- Modal Konfirmasi Pesanan Diterima -->
<div class="modal fade @if(session('error') || $errors->any()) show @endif" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel" aria-hidden="true" @if(session('error') || $errors->any()) style="display: block;" @endif>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Pesanan Diterima</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('konfirmasi.diterima') }}" method="POST">
                    @csrf
                    <input type="hidden" name="idTransaksi" value="{{ old('idTransaksi', $transaction->id) }}">
                    <div class="mb-3">
                        <label for="tanggalPengambilan" class="form-label">Kasir</label>
                        <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPengambilan" class="form-label">Tanggal Pengambilan</label>
                        <input type="datetime-local" class="form-control" id="tanggalPengambilan" name="tanggalPengambilan" value="{{ old('tanggalPengambilan') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalKadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                        <input type="datetime-local" class="form-control" id="tanggalKadaluarsa" name="tanggalKadaluarsa" value="{{ old('tanggalKadaluarsa') }}" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Penolakan Pesanan -->
<div class="modal fade" id="penolakanModal" tabindex="-1" role="dialog" aria-labelledby="penolakanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="penolakanModalLabel">Penolakan Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('konfirmasi.ditolak') }}" method="POST">
                    @csrf
                    <input type="hidden" name="idTransaksi" value="{{ $transaction->id }}"> <!-- Ganti $pesanan->id dengan ID pesanan yang ingin ditolak -->
                    <div class="mb-3">
                        <label for="tanggalPengambilan" class="form-label">Kasir</label>
                        <input type="text" class="form-control" value="{{ $user->nama }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alasanPenolakan" class="form-label">Alasan Penolakan</label>
                        <textarea class="form-control" id="alasanPenolakan" name="alasanPenolakan" rows="3" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if (session('error') || $errors->any())
<!-- Error Alert Modal -->
<div id="error-alert-modal" class="modal fade show" tabindex="-1" role="dialog" aria-hidden="true" style="display: block;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-warning h1 text-warning"></i>
                    <h4 class="mt-2">Gagal!</h4>
                    <p class="mt-3">
                        @if (session('error'))
                        {{ session('error') }}
                        @else
                        {{ $errors->first() }}
                        @endif
                    </p>
                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal" onclick="hideModals()">Kembali</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var errorModal = new bootstrap.Modal(document.getElementById('error-alert-modal'));
        errorModal.show();
    });
</script>
@endif
@endsection

@section('script')
<!-- <script>
    $(document).ready(function() {
        $('#warning-alert-modal').modal('show');
    });
</script> -->
@endsection