@extends('customer.layouts.main')

@section('content')
<section class="mt-lg-14 mt-8 ">
    <div class="container">
        <div class="row">
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
                                            <th></th>
                                            <th>Produk</th>
                                            <th>Total Harga</th>
                                            <th>Total Item</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <a href="{{ route('pesanan.menunggu') }}"><img src="../assets/images/products/product-img-18.jpg" class="img-fluid icon-shape icon-xxl" alt=""></a>

                                            </td>
                                            <td class="align-middle">
                                                <div>
                                                    <h5 class="fs-6 mb-0"><a href="{{ route('pesanan.menunggu') }}" class="text-inherit">Organic Banana</a></h5>
                                                    <small>$.98 / lb</small>
                                                </div>
                                            </td>
                                            <td class="align-middle">$35.00</td>
                                            <td class="align-middle">5</td>
                                            <td class="align-middle"><span class="badge bg-success">In Stock</span></td>
                                        </tr>
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
                                            <th></th>
                                            <th>Produk</th>
                                            <th>Total Harga</th>
                                            <th>Total Item</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <a href="{{ route('pesanan.menunggu') }}"><img src="../assets/images/products/product-img-18.jpg" class="img-fluid icon-shape icon-xxl" alt=""></a>

                                            </td>
                                            <td class="align-middle">
                                                <div>
                                                    <h5 class="fs-6 mb-0"><a href="{{ route('pesanan.menunggu') }}" class="text-inherit">Organic Banana</a></h5>
                                                    <small>$.98 / lb</small>
                                                </div>
                                            </td>
                                            <td class="align-middle">$35.00</td>
                                            <td class="align-middle">5</td>
                                            <td class="align-middle"><span class="badge bg-success">In Stock</span></td>
                                        </tr>
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
                                            <th></th>
                                            <th>Produk</th>
                                            <th>Total Harga</th>
                                            <th>Total Item</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="align-middle">
                                                <a href="{{ route('pesanan.ditolak') }}"><img src="../assets/images/products/product-img-18.jpg" class="img-fluid icon-shape icon-xxl" alt=""></a>

                                            </td>
                                            <td class="align-middle">
                                                <div>
                                                    <h5 class="fs-6 mb-0"><a href="{{ route('pesanan.ditolak') }}" class="text-inherit">Organic Banana</a></h5>
                                                    <small>$.98 / lb</small>
                                                </div>
                                            </td>
                                            <td class="align-middle">$35.00</td>
                                            <td class="align-middle">5</td>
                                            <td class="align-middle"><span class="badge bg-success">In Stock</span></td>
                                        </tr>
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
                                        <th></th>
                                        <th>Produk</th>
                                        <th>Total Harga</th>
                                        <th>Total Item</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">
                                            <a href="{{ route('pesanan.selesai') }}"><img src="../assets/images/products/product-img-18.jpg" class="img-fluid icon-shape icon-xxl" alt=""></a>

                                        </td>
                                        <td class="align-middle">
                                            <div>
                                                <h5 class="fs-6 mb-0"><a href="{{ route('pesanan.selesai') }}" class="text-inherit">Organic Banana</a></h5>
                                                <small>$.98 / lb</small>
                                            </div>
                                        </td>
                                        <td class="align-middle">$35.00</td>
                                        <td class="align-middle">5</td>
                                        <td class="align-middle"><span class="badge bg-success">In Stock</span></td>
                                    </tr>
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