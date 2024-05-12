@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">

            </div>
            <h4 class="page-title">Laporan Bulanan</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xxl-3">
        <div class="card mb-3">
            <div class="card-body">
                <div class="border border-light p-3 rounded mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="font-18 mb-1">Total Pendapatan</p>
                            <h3 class="text-primary my-0">Rp {{ number_format($totalPendapatany, 0, ',', '.') }}</h3>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-primary rounded-circle h3 my-0">
                                <i class="mdi mdi-arrow-down-bold-outline"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xxl-3">
        <div class="card mb-3">
            <div class="card-body">
                <div class="border border-light p-3 rounded mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="font-18 mb-1">Total Customer</p>
                            <h3 class="text-success my-0">{{ $jumlahCustomery }}</h3>
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-success rounded-circle h3 my-0">
                                <i class="mdi mdi-swap-horizontal"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xxl-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="header-title mb-0">Pendapatan Tahun ini</h4>
                    <div>
                        <form class="d-flex" method="GET" action="{{ route('laporan.bulanan') }}">
                            <div class="input-group" style="margin-left: 10px;">
                                <select class="form-select form-select-light" name="tahun">
                                    @php
                                    $currentYear = date('Y');
                                    $startYear = $currentYear - 10; // Ubah nilai 10 sesuai dengan rentang tahun yang diinginkan
                                    $endYear = $currentYear + 0; // Ubah nilai 10 sesuai dengan rentang tahun yang diinginkan
                                    @endphp
                                    @for ($year = $startYear; $year <= $endYear; $year++) <option value="{{ $year }}" {{ $year == old('tahun', date('Y')) ? 'selected' : '' }}>
                                        {{ $year }}
                                        </option>
                                        @endfor
                                </select>
                            </div>
                            <!-- Tombol submit -->
                            <button type="submit" class="btn btn-primary ms-2">
                                <i class="dripicons-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Bulan</th>
                                <th scope="col">Total Item</th>
                                <th scope="col">Total Pendapatan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($transactions->count() > 0)
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $bulanNama[$transaction->Bulan_ke - 1] }}</td>
                                <td>{{ $transaction->produk }} pcs</td>
                                <td>Rp {{ number_format($transaction->totalPerbulan, 0, ',', '.') }}</td>
                                <td>
                                    <button type="button" class="btn btn-info detail-toggle" data-bs-toggle="modal" data-bs-target="#full-width-modal" data-bs-bulan="{{ $transaction->Bulan_ke }}" data-bs-tahun="{{ $transaction->Tahun }}">
                                        <i class="uil uil-eye"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data transaksi untuk periode ini.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Full width modal -->
    <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Detail</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jenis Transaksi</th>
                                    <th scope="col">Total Item</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col" class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($detailTransactions))
                                @foreach($detailTransactions as $detail)
                                <tr>
                                    <td><i class="uil uil-calender me-1"></i>{{ $detail->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if($detail->jenis_transaksi == 'pesan')
                                        <span class="badge bg-success-lighten text-success">{{ $detail->jenis_transaksi }}</span>
                                        @else
                                        <span class="badge bg-warning-lighten text-warning">{{ $detail->jenis_transaksi }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="text-black fw-semibold">{{ $detail->total_item }} pcs</span>
                                    </td>
                                    <td>
                                        <span class="text-black fw-semibold">Rp {{ number_format($detail->total_harga, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="text-end">
                                        @if ($detail->jenis_transaksi == 'langsung' && $detail->status_transaksi == 'selesai')
                                        <a href="{{ route('show.langsung', $detail->id) }}" class="font-18 text-info me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i class="uil uil-eye"></i></a>
                                        @elseif ($detail->jenis_transaksi == 'pesan' && $detail->status_transaksi == 'selesai')
                                        <a href="{{ route('show.pesan', $detail->id) }}" class="font-18 text-info me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i class="uil uil-eye"></i></a>
                                        @else
                                        <!-- Kondisi lainnya jika diperlukan -->
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data transaksi untuk periode ini.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>
@endsection

@section('script')
<!-- GET TAHUN -->
<script>
    $(document).ready(function() {
        $('#btnSubmit').on('click', function() {
            var selectedYear = $('#selectYear').val();
            window.location.href = "{{ route('laporan.bulanan') }}?tahun=" + selectedYear;
        });
    });
</script>
<!-- Menampilkan Model Detail -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const detailToggles = document.querySelectorAll(".detail-toggle");

    detailToggles.forEach(toggle => {
        toggle.addEventListener("click", function() {
            const bulan = this.getAttribute("data-bs-bulan");
            const tahun = this.getAttribute("data-bs-tahun");
            const detailUrl = `/laporan/bulanan/detail?bulan=${bulan}&tahun=${tahun}`;

            fetch(detailUrl)
                .then(response => response.text())
                .then(data => {
                    document.querySelector(".modal-body").innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });
    });
});
</script>
@endsection