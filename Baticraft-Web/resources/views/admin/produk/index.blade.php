@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Produk<a href="javascript: void(0);"></a></li>
                </ol>
            </div>
            <h4 class="page-title">Produk</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="state-saving-preview">
                        <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 1.5em;">
                            <i class="uil uil-user-plus"></i> Tambah Produk
                        </a>
                        <table id="state-saving-datatable" class="table table-striped activate-select dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody align="center">
                                @php $i = 1; @endphp
                                @foreach ($data as $row)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <!-- <img src="{{ asset('assets/customer/images/login.png') }}" alt="contact-img" title="contact-img" class="rounded me-3" height="48" /> -->
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            <a href="apps-ecommerce-products-details.html" class="text-body">{{ $row->nama }}</a>
                                        </p>
                                    </td>
                                    <td>{{ $row->kategori }}</td>
                                    <td>Rp. {{ $row->harga }}</td>
                                    <td>{{ $row->stok }} pcs</td>
                                    <td>
                                        @if ($row->status == 'Tersedia')
                                        <span class="badge bg-success">{{ $row->status }}</span>
                                        @else
                                        <span class="badge bg-danger">{{ $row->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-info"><i class="uil-eye"></i> Lihat</a>
                                        <a href="#" class="btn btn-success">
                                            <i class="mdi mdi-pencil"></i> Edit
                                        </a>
                                        <form action="#" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                                <i class="mdi mdi-window-close"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end tab-content-->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->
@endsection
