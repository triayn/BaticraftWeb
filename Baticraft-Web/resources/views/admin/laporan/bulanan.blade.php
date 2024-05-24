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
                            </tr>
                        </thead>
                        <tbody>
                            @if($transactions->count() > 0)
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $bulanNama[$transaction->Bulan_ke - 1] }}</td>
                                <td>{{ $transaction->produk }} pcs</td>
                                <td>Rp {{ number_format($transaction->totalPerbulan, 0, ',', '.') }}</td>
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
@endsection