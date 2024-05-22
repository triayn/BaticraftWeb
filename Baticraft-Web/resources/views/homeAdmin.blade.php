@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="d-flex">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-light" id="dash-daterange" readonly>
                    </div>
                </form>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-sm-6 col-lg-6">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                <h3><span>{{ $customer }}</span></h3>
                                <p class="text-muted font-15 mb-0">Customer Bulan ini</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6">
                        <div class="card shadow-none m-0 border-start">
                            <div class="card-body text-center">
                                <i class="dripicons-graph-line text-muted" style="font-size: 24px;"></i>
                                <h3><span>Rp {{ number_format($pendapatan, 0, ',', '.') }}</span></h3>
                                <p class="text-muted font-15 mb-0">Pendapatan Bulan ini</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
        </div> <!-- end card-box-->
    </div> <!-- end col-->
</div>
<!-- end row-->

<div class="row">
    <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="header-title">Produk Terlaris</h4>
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <tbody>
                            @foreach ($topProducts as $product)
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{ $product->total_jumlah }}</h5>
                                    <span class="text-muted font-13">Terjual</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">Rp {{ number_format($product->product->harga, 0, ',', '.') }}</h5>
                                    <span class="text-muted font-13">Harga</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{ $product->product->stok }}</h5>
                                    <span class="text-muted font-13">Stok</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">{{ $product->nama_product }}</h5>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-3 col-lg-6 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="header-title">Kategori Produk</h4>
                </div>
                <div class="chart-widget-list" style="margin-top: 10px;">
                    @foreach($salesByCategory as $category)
                    @php
                    $colorClass = '';
                    switch ($category->kategori) {
                    case 'kain':
                    $colorClass = 'text-primary';
                    break;
                    case 'kemeja':
                    $colorClass = 'text-success';
                    break;
                    case 'kaos':
                    $colorClass = 'text-warning';
                    break;
                    }
                    @endphp
                    <p>
                        <i class="mdi mdi-square {{ $colorClass }}"></i> {{ ucfirst($category->kategori) }}
                        <span class="float-end">{{ number_format($category->total_penjualan) }}</span>
                    </p>
                    @endforeach
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

    <div class="col-xl-3 col-lg-6 order-lg-1">
        <div class="card">
            <div class="card-body pb-0">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="header-title">Pesanan</h4>
                </div>
            </div>

            <div class="card-body py-0" data-simplebar style="max-height: 405px;" style="margin-top: 10px;">
                <div class="timeline-alt py-0">
                    <div class="timeline-item">
                        <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="{{ route('masuk.index') }}" class="text-info fw-bold mb-1 d-block">Pesanan masuk</a>
                            <small> <span class="fw-bold">{{ $masuk }}</span> </small>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="{{ route('diproses.index') }}" class="text-primary fw-bold mb-1 d-block">Pesanan Diproses</a>
                            <small><span class="fw-bold">{{ $diproses }}</span></small>
                        </div>
                    </div>
                </div>
                <!-- end timeline -->
            </div> <!-- end slimscroll -->
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->
</div>

<div class="row">
    <h4 class="page-title">Hari Ini</h4>

    <div class="col-xl-6 col-lg-6">

        <div class="row">
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Pesanan Masuk</h5>
                        <h3 class="mt-3 mb-3">{{ $menunggu }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-cart-plus widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Pesanan Selesai</h5>
                        <h3 class="mt-3 mb-3">{{ $selesai }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div> <!-- end col -->

    <div class="col-xl-6 col-lg-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-currency-usd widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Total Item Terjual</h5>
                        <h3 class="mt-3 mb-3">{{ $item }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                            <i class="mdi mdi-pulse widget-icon"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Pendapatan</h5>
                        <h3 class="mt-3 mb-3">Rp {{ number_format($pendapatanH, 0, ',', '.') }}</h3>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->
    </div>
</div>
<!-- end row -->

@endsection