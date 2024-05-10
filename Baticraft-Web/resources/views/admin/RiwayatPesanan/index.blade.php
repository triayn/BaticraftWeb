@extends('admin.layouts.main')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Pesanan / <a href="javascript: void(0);">Riwayat</a></li>
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
                <div class="tab-content">
                    <div class="tab-pane show active" id="state-saving-preview">
                        <table id="state-saving-datatable" class="table table-striped activate-select dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No</th>
                                    <th style="text-align: center;">Kode Transaksi</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Status Transaksi</th>
                                    <th style="text-align: center;">Tanggal</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @foreach ($riwayat as $row)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td class="align-middle">{{ $row->kode_transaksi }}</td>
                                    <td class="align-middle">{{ $row->user->nama }}</td>
                                    <td class="align-middle">
                                        @if($row->status_transaksi == 'ditolak')
                                        <label class="badge bg-danger">Ditolak</label>
                                        @else
                                        <label class="badge bg-success">Selesai</label>
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $row->created_at }}</td>
                                    <td>
                                        @if ($row->jenis_transaksi == 'langsung' && $row->status_transaksi == 'selesai')
                                        <a href="{{ route('show.langsung', $row->id) }}" class="btn btn-info">
                                            <i class="uil-eye"></i> Detail
                                        </a>
                                        @elseif ($row->jenis_transaksi == 'pesan' && $row->status_transaksi == 'selesai')
                                        <a href="{{ route('show.pesan', $row->id) }}" class="btn btn-info">
                                            <i class="uil-eye"></i> Detail
                                        </a>
                                        @elseif ($row->status_transaksi == 'ditolak')
                                        <a href="{{ route('show.ditolak', $row->id) }}" class="btn btn-info">
                                            <i class="uil-eye"></i> Detail
                                        </a>
                                        @else
                                        <!-- Kondisi lainnya jika diperlukan -->
                                        @endif
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