@extends('admin.layouts.main')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Pengguna</a></li>
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
                <h4 class="header-title">
                    <center>Data Pengguna</center>
                </h4>
                <p class="text-muted font-14"></p>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#state-saving-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        </a>
                    </li>
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="state-saving-preview">
                        <table id="state-saving-datatable" class="table table-striped activate-select 
                        dt-responsive nowrap w-100">
                            <a href="" class="btn btn-success btn-sm">
                                Tambah Pengguna</a>
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

                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($data as $row)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->no_telpon }}</td>
                                    <td>{{ $row->role }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        <a href="" class="btn btn-info"><i class="mdi mdi-keyboard">
                                            </i>Lihat</a>
                                        <a href="" class="btn btn-success">
                                            <i class="mdi mdi-thumb-up-outline"></i> Edit</a>
                                        <button type="button" class="btn btn-danger">
                                            <i class="mdi mdi-window-close"> Hapus</i></button>
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