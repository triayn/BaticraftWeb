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
                <p class="mb-0"><b>Kode Kasir :</b> {{ $transaction->kasir }}</p>
                <p class="mb-0"><b>Note Admin :</b> {{ $transaction->catatan_admin }}</p>
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
@endsection

@section('script')

@endsection