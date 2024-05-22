@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">

            </div>
            <h4 class="page-title">Laporan Hari Ini</h4>
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
                            <h3 class="text-primary my-0">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
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
                            <h3 class="text-success my-0">{{ $jumlahCustomer }}</h3>
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
                    <h4 class="header-title mb-0">Pesanan dan Transaksi</h4>
                </div>
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
                            @foreach($transactions as $transaction)
                            <tr>
                                <td><i class="uil uil-calender me-1"></i>{{ $transaction->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @if($transaction->jenis_transaksi == 'pesan')
                                    <span class="badge bg-success-lighten text-success">{{ $transaction->jenis_transaksi }}</span>
                                    @else
                                    <span class="badge bg-warning-lighten text-warning">{{ $transaction->jenis_transaksi }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-black fw-semibold">{{ $transaction->total_item }} pcs</span>
                                </td>
                                <td>
                                    <span class="text-black fw-semibold">Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</span>
                                </td>
                                <td class="text-end">
                                    @if ($transaction->jenis_transaksi == 'langsung' && $transaction->status_transaksi == 'selesai')
                                    <a href="{{ route('show.langsung', $transaction->id) }}" class="font-18 text-info me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                        <i class="uil uil-eye"></i></a>
                                    @elseif ($transaction->jenis_transaksi == 'pesan' && $transaction->status_transaksi == 'selesai')
                                    <a href="{{ route('show.pesan', $transaction->id) }}" class="font-18 text-info me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                        <i class="uil uil-eye"></i></a>
                                    @else
                                    <!-- Kondisi lainnya jika diperlukan -->
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection