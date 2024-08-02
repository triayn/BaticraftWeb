@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Pengguna / <a href="javascript: void(0);">Admin</a></li>
                </ol>
            </div>
            <h4 class="page-title">Pengguna</h4>
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
                        <table id="state-saving-datatable" class="table table-striped activate-select 
                            dt-responsive nowrap w-100">
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 1.5em;">
                                <i class="uil uil-user-plus"></i> Tambah Pengguna
                            </a>
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">No. Telepon</th>
                                    <th style="text-align: center;">Role</th>
                                    <th style="text-align: center;">Email</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody align="center">
                                @php $i = 1; @endphp
                                @foreach ($data as $row)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><a href="{{ route('user.show', $row->id) }}"></a>{{ $row->nama }}</td>
                                    <td>{{ $row->no_telpon }}</td>
                                    <td>{{ $row->role }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $row->id) }}" class="btn btn-info"><i class="uil-eye">
                                            </i></a>
                                        <!-- <a href="" class="btn btn-warning"><i class="uil-pen">
                                            </i>Edit</a> -->
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
                                                        <h4 class="mt-0">{{ $row->nama }}</h4>
                                                        <h5 class="mt-0">Anda yakin ingin menghapus pengguna ini?</h5>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- Form Hapus di Dalam Modal -->
                                                        <form id="deleteProductForm-{{ $row->id }}" action="{{ route('user.delete', $row->id) }}" method="POST" style="display: inline-block;">
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