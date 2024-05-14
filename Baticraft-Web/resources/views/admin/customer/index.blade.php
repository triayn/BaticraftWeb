@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Pengguna / <a href="javascript: void(0);">Customer</a></li>
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
                <div class="tab-content">
                    <div class="tab-pane show active" id="state-saving-preview">
                        <table id="state-saving-datatable" class="table table-striped activate-select 
                        dt-responsive nowrap w-100">
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
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->no_telpon }}</td>
                                    <td>{{ $row->role }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        <a href="{{ route('customer.show', $row->id) }}" class="btn btn-info"><i class="uil-eye">
                                            </i>Lihat</a>
                                        <!-- <form action="{{ route('customer.delete', $row->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">
                                                <i class="mdi mdi-window-close"></i> Hapus
                                            </button>
                                        </form> -->
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