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
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <i class="dripicons-checkmark me-2"></i> <strong>{{ session('success') }}</strong>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    <i class="dripicons-wrong me-2"></i> <strong>{{ session('error') }}</strong>
                </div>
                @endif
                <div class="tab-content">
                    <div class="tab-pane show active" id="state-saving-preview">
                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 1.5em;">
                            <i class="uil uil-user-plus"></i> Tambah Produk
                        </a>
                        <table id="state-saving-rowtable" class="table table-striped activate-select dt-responsive nowrap w-100">
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

                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($data as $row)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if($images->isNotEmpty())
                                        @foreach($images as $image)
                                        @if($image->product_id == $row->id)
                                        <img src="{{ asset('storage/product/' . $image->image_path) }}" alt="contact-img" title="contact-img" class="rounded me-3" height="48" />
                                        @break
                                        @endif
                                        @endforeach
                                        @endif
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            <a href="{{ route('product.show', $row->id) }}" class="text-body">{{ $row->nama }}</a>
                                        </p>
                                    </td>
                                    <td>{{ $row->kategori }}</td>
                                    <td>Rp {{ number_format($row->harga, 0, ',', '.') }}</td>
                                    <td>{{ $row->stok }} pcs</td>
                                    <td>
                                        @if($row->status == 'tersedia')
                                        <span class="badge bg-success">{{ $row->status }}</span>
                                        @else
                                        <span class="badge bg-danger">{{ $row->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('product.show', $row->id) }}" class="btn btn-info"><i class="uil-eye"></i> </a>
                                        <a href="{{ route('product.edit', $row->id) }}" class="btn btn-success">
                                            <i class="mdi mdi-pencil"></i> 
                                        </a>
                                        <!-- Button Hapus dengan Modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#info-header-modal-{{ $row->id }}">
                                            <i class="mdi mdi-trash-can"></i> 
                                        </button>
                                        <!-- Modal Hapus-->
                                        <div id="info-header-modal-{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info-header-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header modal-colored-header bg-info">
                                                        <h4 class="modal-title" id="info-header-modalLabel">Hapus Produk?</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 class="mt-0">Anda yakin ingin menghapus produk ini?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- Form Hapus di Dalam Modal -->
                                                        <form id="deleteProductForm-{{ $row->id }}" action="{{ route('product.delete', $row->id) }}" method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-info">Hapus</button>
                                                        </form>
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
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