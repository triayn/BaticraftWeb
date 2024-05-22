@extends('customer.layouts.main')

@section('content')
<section class="mt-lg-14 mt-8 ">
    <div class="container">
        <div class="empat">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                    <!-- nav item -->
                    <li class="nav-item" role="presentation">
                        <!-- btn --> <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true">Menunggu</button>
                    </li>
                    <!-- nav item -->
                    <li class="nav-item" role="presentation">
                        <!-- btn --> <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Diproses</button>
                    </li>
                    <!-- nav item -->
                    <li class="nav-item" role="presentation">
                        <!-- btn --> <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews-tab-pane" type="button" role="tab" aria-controls="reviews-tab-pane" aria-selected="false">Ditolak</button>
                    </li>
                    <!-- nav item -->
                    <li class="nav-item" role="presentation">
                        <!-- btn --> <button class="nav-link" id="sellerInfo-tab" data-bs-toggle="tab" data-bs-target="#sellerInfo-tab-pane" type="button" role="tab" aria-controls="sellerInfo-tab-pane" aria-selected="false">Selesai</button>
                    </li>
                </ul>
                <!-- tab content -->
                <div class="tab-content" id="myTabContent">
                    <!-- tab pane -->
                    <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                        <div class="my-8">
                            <!-- table -->
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Pesanan</th>
                                            <th>Total Harga</th>
                                            <th>Total Item</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($menunggu as $satu)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="align-middle"><a href="{{ route('pesanan.detail', $satu->id) }}">{{ $satu->kode_transaksi }}</a></td>
                                            <td class="align-middle">Rp {{ number_format($satu->total_harga, 0, ',', '.') }}</td>
                                            <td class="align-middle">{{ $satu->total_item }}</td>
                                            <td class="align-middle"><span class="badge bg-info">{{ $satu->status_transaksi }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- tab pane -->
                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="my-8">
                            <!-- table -->
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Pesanan</th>
                                            <th>Total Harga</th>
                                            <th>Total Item</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($diproses as $dua)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="align-middle"><a href="{{ route('pesanan.detail', $satu->id) }}">{{ $dua->kode_transaksi }}</a></td>
                                            <td class="align-middle">Rp {{ number_format($dua->total_harga, 0, ',', '.') }}</td>
                                            <td class="align-middle">{{ $dua->total_item }}</td>
                                            <td class="align-middle"><span class="badge bg-warning">{{ $dua->status_transaksi }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- tab pane -->
                    <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                        <div class="my-8">
                            <!-- table -->
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Pesanan</th>
                                            <th>Total Harga</th>
                                            <th>Total Item</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i = 1; @endphp
                                        @foreach ($ditolak as $tiga)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td class="align-middle"><a href="{{ route('pesanan.detail', $tiga->id) }}">{{ $tiga->kode_transaksi }}</a></td>
                                            <td class="align-middle">Rp {{ number_format($tiga->total_harga, 0, ',', '.') }}</td>
                                            <td class="align-middle">{{ $tiga->total_item }}</td>
                                            <td class="align-middle"><span class="badge bg-danger">{{ $tiga->status_transaksi }}</span></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- tab pane -->
                    <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab" tabindex="0">
                        <!-- table -->
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Pesanan</th>
                                        <th>Total Harga</th>
                                        <th>Total Item</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    @foreach ($selesai as $empat)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td class="align-middle"><a href="{{ route('pesanan.detail', $empat->id) }}">{{ $empat->kode_transaksi }}</a></td>
                                        <td class="align-middle">Rp {{ number_format($empat->total_harga, 0, ',', '.') }}</td>
                                        <td class="align-middle">{{ $empat->total_item }}</td>
                                        <td class="align-middle"><span class="badge bg-success">{{ $empat->status_transaksi }}</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')

@endsection