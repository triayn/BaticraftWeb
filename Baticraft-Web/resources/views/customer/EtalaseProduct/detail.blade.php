@extends('customer.layouts.main')
@section('content')
<section class="mt-8">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- img slide -->
                <div class="product" id="product">
                    @if($images->isNotEmpty())
                    <div class="zoom" onmousemove="zoom(event)">
                        <!-- img -->
                        <img src="{{ asset('storage/product/' . $images[0]->image_path) }}" alt="">
                    </div>
                    @endif
                </div>
                <!-- product tools -->
                @foreach($images as $image)
                <div class="product-tools">
                    <div class="thumbnails row g-3" id="productThumbnails">
                        <div class="col-3">
                            <div class="thumbnails-img">
                                <!-- img -->
                                <img src="{{ asset('storage/product/' . $image->image_path) }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-6">
                <div class="ps-lg-10">
                    <!-- content -->
                    <a href="#!" class="mb-4 d-block">{{ $data->kategori }}</a>
                    <!-- heading -->
                    <h1 class="mb-1">{{ $data->nama }} </h1>
                    <div class="fs-4">
                        <!-- price --><span class="fw-bold text-dark">Rp {{ number_format($data->harga, 0, ',', '.') }}</span> 
                    </div>
                    <!-- hr -->
                    <hr class="my-6">
                    <div class="mt-5 d-flex justify-content-start">
                        <div class="col-lg-2 col-3 ">
                            <!-- input -->
                            <div class="input-group  flex-nowrap justify-content-center ">
                                <input type="button" value="-" class="button-minus form-control  text-center flex-xl-none w-xl-30 w-xxl-10 px-0  " data-field="quantity">
                                <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control text-center flex-xl-none w-xl-30 w-xxl-10 px-0 ">
                                <input type="button" value="+" class="button-plus form-control  text-center flex-xl-none w-xl-30  w-xxl-10 px-0  " data-field="quantity">
                            </div>
                        </div>
                        <div class="ms-2 col-lg-8 col-5 d-grid">
                            <!-- button -->
                            <!-- btn --> <button type="button" class="btn btn-primary"><i class="feather-icon icon-shopping-bag me-2"></i>Masukkan Keranjang</button>
                        </div>
                    </div>
                    <!-- hr -->
                    <hr class="my-6">
                    <div>
                        <!-- table -->
                        <table class="table table-borderless">

                            <tbody>
                                <tr>
                                    <td>Kode Produk:</td>
                                    <td>{{ $data->kode_product }}</td>

                                </tr>
                                <tr>
                                    <td>Stok:</td>
                                    <td>{{ $data->stok }} pcs</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-lg-14 mt-8 ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills nav-lb-tab" id="myTab" role="tablist">
                    <!-- nav item -->
                    <li class="nav-item" role="presentation">
                        <!-- btn --> <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="true">Detail Produk</button>
                    </li>
                    <!-- nav item -->
                    <li class="nav-item" role="presentation">
                        <!-- btn --> <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Informasi</button>
                    </li>
                </ul>
                <!-- tab content -->
                <div class="tab-content" id="myTabContent">
                    <!-- tab pane -->
                    <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
                        <div class="my-8 col-lg-6" >
                            <div class="mb-5">
                                <!-- text -->
                                <h4 class="mb-1">Deskripsi:</h4>
                                <p class="mb-0">{{ $data->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- tab pane -->
                    <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="my-8">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="mb-4">Detail</h4>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <table class="table table-striped">
                                        <!-- table -->
                                        <tbody>
                                            <tr>
                                                <th>Jenis Batik</th>
                                                <td>{{ $data->jenis_batik }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ukuran</th>
                                                <td>{{ $data->ukuran }}</td>
                                            </tr>
                                            <tr>
                                                <th>Bahan</th>
                                                <td>{{ $data->bahan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Panjang Kain</th>
                                                <td>{{ $data->panjang_kain }}</td>
                                            </tr>
                                            <tr>
                                                <th>Lebar Kain</th>
                                                <td>{{ $data->lebar_kain }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Lengan</th>
                                                <td>{{ $data->jenis_lengan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab pane -->
                    <div class="tab-pane fade" id="reviews-tab-pane" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
                        <div class="my-8">
                            <!-- row -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="me-lg-12 mb-6 mb-md-0">
                                        <div class="mb-5">
                                            <!-- title -->
                                            <h4 class="mb-3">Customer reviews</h4>
                                            <span>
                                                <!-- rating --> <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-half"></i></small><span class="ms-3">4.1 out of 5</span><small class="ms-3">11,130 global ratings</small></span>
                                        </div>
                                        <div class="mb-8">
                                            <!-- progress -->
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">5</span><i class="bi bi-star-fill ms-1 small text-warning"></i></div>
                                                <div class="w-100">
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div><span class="text-muted ms-3">53%</span>
                                            </div>
                                            <!-- progress -->
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">4</span><i class="bi bi-star-fill ms-1 small text-warning"></i></div>
                                                <div class="w-100">
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="50"></div>
                                                    </div>
                                                </div><span class="text-muted ms-3">22%</span>
                                            </div>
                                            <!-- progress -->
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">3</span><i class="bi bi-star-fill ms-1 small text-warning"></i></div>
                                                <div class="w-100">
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="35"></div>
                                                    </div>
                                                </div><span class="text-muted ms-3">14%</span>
                                            </div>
                                            <!-- progress -->
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">2</span><i class="bi bi-star-fill ms-1 small text-warning"></i></div>
                                                <div class="w-100">
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 22%;" aria-valuenow="22" aria-valuemin="0" aria-valuemax="22"></div>
                                                    </div>
                                                </div><span class="text-muted ms-3">5%</span>
                                            </div>
                                            <!-- progress -->
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="text-nowrap me-3 text-muted"><span class="d-inline-block align-middle text-muted">1</span><i class="bi bi-star-fill ms-1 small text-warning"></i></div>
                                                <div class="w-100">
                                                    <div class="progress" style="height: 6px;">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 14%;" aria-valuenow="14" aria-valuemin="0" aria-valuemax="14"></div>
                                                    </div>
                                                </div><span class="text-muted ms-3">7%</span>
                                            </div>
                                        </div>
                                        <div class="d-grid">
                                            <h4>Review this product</h4>
                                            <p class="mb-0">Share your thoughts with other customers.</p>
                                            <a href="#" class="btn btn-outline-gray-400 mt-4 text-muted">Write the Review</a>
                                        </div>

                                    </div>
                                </div>
                                <!-- col -->
                                <div class="col-md-8">
                                    <div class="mb-10">
                                        <div class="d-flex justify-content-between align-items-center mb-8">
                                            <div>
                                                <!-- heading -->
                                                <h4>Reviews</h4>
                                            </div>
                                            <div>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Top Review</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="d-flex border-bottom pb-6 mb-6">
                                            <!-- img -->
                                            <!-- img --><img src="../assets/images/avatar/avatar-10.jpg" alt="" class="rounded-circle avatar-lg">
                                            <div class="ms-5">
                                                <h6 class="mb-1">
                                                    Shankar Subbaraman

                                                </h6>
                                                <!-- select option -->
                                                <!-- content -->
                                                <p class="small"> <span class="text-muted">30 December 2022</span>
                                                    <span class="text-primary ms-3 fw-bold">Verified Purchase</span>
                                                </p>
                                                <!-- rating -->
                                                <div class=" mb-2">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <span class="ms-3 text-dark fw-bold">Need to recheck the weight at delivery point</span>
                                                </div>
                                                <!-- text-->
                                                <p>Product quality is good. But, weight seemed less than 1kg. Since it is being sent in open
                                                    package, there is a possibility of pilferage in between. FreshCart sends the veggies and
                                                    fruits through sealed plastic covers and Barcode on the weight etc. .</p>
                                                <div>
                                                    <div class="border rounded-3 icon-shape icon-lg border-2 ">
                                                        <!-- img --><img src="../assets/images/products/product-img-1.jpg" alt="" class="img-fluid rounded-3">
                                                    </div>
                                                    <div class="border rounded-3 icon-shape icon-lg border-2 ms-1 ">
                                                        <!-- img --><img src="../assets/images/products/product-img-2.jpg" alt="" class="img-fluid rounded-3">
                                                    </div>
                                                    <div class="border rounded-3 icon-shape icon-lg border-2 ms-1 ">
                                                        <!-- img --><img src="../assets/images/products/product-img-3.jpg" alt="" class="img-fluid rounded-3">
                                                    </div>

                                                </div>
                                                <!-- icon -->
                                                <div class="d-flex justify-content-end mt-4">
                                                    <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                                                    <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                                                        abuse</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                                            <!-- img --><img src="../assets/images/avatar/avatar-12.jpg" alt="" class="rounded-circle avatar-lg">
                                            <div class="ms-5">
                                                <h6 class="mb-1">
                                                    Robert Thomas

                                                </h6>
                                                <!-- content -->
                                                <p class="small"> <span class="text-muted">29 December 2022</span>
                                                    <span class="text-primary ms-3 fw-bold">Verified Purchase</span>
                                                </p>
                                                <!-- rating -->
                                                <div class=" mb-2">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-muted"></i>
                                                    <span class="ms-3 text-dark fw-bold">Need to recheck the weight at delivery point</span>
                                                </div>

                                                <p>Product quality is good. But, weight seemed less than 1kg. Since it is being sent in open
                                                    package, there is a possibility of pilferage in between. FreshCart sends the veggies and
                                                    fruits through sealed plastic covers and Barcode on the weight etc. .</p>

                                                <!-- icon -->
                                                <div class="d-flex justify-content-end mt-4">
                                                    <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                                                    <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                                                        abuse</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                                            <!-- img --><img src="../assets/images/avatar/avatar-9.jpg" alt="" class="rounded-circle avatar-lg">
                                            <div class="ms-5">
                                                <h6 class="mb-1">
                                                    Barbara Tay

                                                </h6>
                                                <!-- content -->
                                                <p class="small"> <span class="text-muted">28 December 2022</span>
                                                    <span class="text-danger ms-3 fw-bold">Unverified Purchase</span>
                                                </p>
                                                <!-- rating -->
                                                <div class=" mb-2">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-muted"></i>
                                                    <span class="ms-3 text-dark fw-bold">Need to recheck the weight at delivery point</span>
                                                </div>

                                                <p>Everytime i ordered from fresh i got greenish yellow bananas just like i wanted so go for
                                                    it , its happens very rare that u get over riped ones.</p>

                                                <!-- icon -->
                                                <div class="d-flex justify-content-end mt-4">
                                                    <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                                                    <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                                                        abuse</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom pb-6 mb-6 pt-4">
                                            <!-- img --><img src="../assets/images/avatar/avatar-8.jpg" alt="" class="rounded-circle avatar-lg">
                                            <div class="ms-5 flex-grow-1">
                                                <h6 class="mb-1">
                                                    Sandra Langevin

                                                </h6>
                                                <!-- content -->
                                                <p class="small"> <span class="text-muted">8 December 2022</span>
                                                    <span class="text-danger ms-3 fw-bold">Unverified Purchase</span>
                                                </p>
                                                <!-- rating -->
                                                <div class=" mb-2">
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-warning"></i>
                                                    <i class="bi bi-star-fill text-muted"></i>
                                                    <span class="ms-3 text-dark fw-bold">Great product</span>
                                                </div>

                                                <p>Great product & package. Delivery can be expedited. </p>

                                                <!-- icon -->
                                                <div class="d-flex justify-content-end mt-4">
                                                    <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                                                    <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                                                        abuse</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="#" class="btn btn-outline-gray-400 text-muted">Read More Reviews</a>
                                        </div>
                                    </div>
                                    <div>
                                        <!-- rating -->
                                        <h3 class="mb-5">Create Review</h3>
                                        <div class="border-bottom py-4 mb-4">
                                            <h4 class="mb-3">Overall rating</h4>
                                            <div id="rater"></div>
                                        </div>
                                        <div class="border-bottom py-4 mb-4">
                                            <h4 class="mb-0">Rate Features</h4>
                                            <div class="my-5">
                                                <h5>Flavor</h5>
                                                <div id="rate-2"></div>
                                            </div>
                                            <div class="my-5">
                                                <h5>Value for money</h5>
                                                <div id="rate-3"></div>
                                            </div>
                                            <div class="my-5">
                                                <h5>Scent</h5>
                                                <div id="rate-4"></div>
                                            </div>


                                        </div>
                                        <!-- form control -->
                                        <div class="border-bottom py-4 mb-4">
                                            <h5>Add a headline</h5>
                                            <input type="text" class="form-control" placeholder="What’s most important to know">
                                        </div>
                                        <div class="border-bottom py-4 mb-4">
                                            <h5>Add a photo or video</h5>
                                            <p>Shoppers find images and videos more helpful than text alone.</p>
                                            <!-- form -->
                                            <form action="#" class=" dropzone profile-dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple />
                                                </div>
                                            </form>

                                        </div>
                                        <div class=" py-4 mb-4">
                                            <!-- heading -->
                                            <h5>Add a written review</h5>
                                            <textarea class="form-control" rows="3" placeholder="What did you like or dislike? What did you use this product for?"></textarea>

                                        </div>
                                        <!-- button -->
                                        <div class="d-flex justify-content-end">
                                            <a href="#" class="btn btn-primary">Submit Review</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- tab pane -->
                    <div class="tab-pane fade" id="sellerInfo-tab-pane" role="tabpanel" aria-labelledby="sellerInfo-tab" tabindex="0">...</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection