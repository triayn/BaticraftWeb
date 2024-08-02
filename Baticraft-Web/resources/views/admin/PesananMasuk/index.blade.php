@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Pesanan / <a href="javascript: void(0);">Pesanan Masuk</a></li>
                </ol>
            </div>
            <h4 class="page-title">Pesanan</h4>
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
                        <table id="state-saving-datatable" class="table table-striped activate-select dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Kode Transaksi</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Total Harga</th>
                                    <th style="text-align: center;">Tanggal</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($menunggu as $row)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="align-middle">{{ $row->kode_transaksi }}</td>
                                    <td class="align-middle">{{ $row->user->nama }}</td>
                                    <td class="align-middle">Rp {{ number_format($row->total_harga, 0, ',', '.') }}</td>
                                    <td class="align-middle">{{ $row->created_at }}</td>
                                    <td>
                                        <a href="{{ route('masuk.konfirmasi', $row->id) }}" class="btn btn-success">
                                            <i class="mdi mdi-pencil"></i> Konfirmasi
                                        </a>
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