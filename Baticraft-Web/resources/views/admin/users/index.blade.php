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
                        <p class="text-muted font-14">
                        </p>

                        <ul class="nav nav-tabs nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="#state-saving-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link">

                                </a>
                            </li>
                        </ul> <!-- end nav-->
                        <div class="tab-content">
                            <div class="tab-pane show active" id="state-saving-preview">
                                <table id="state-saving-datatable"
                                    class="table table-striped activate-select dt-responsive nowrap w-100">
                                    <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">Tambah Pengguna</a>
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
                                        <tr>
                                            <td>1</td>
                                            <td>Tiger Binleon</td>
                                            <td>089765437282</td>
                                            <td>Admin</td>
                                            <td>tigerlion@gmail.com</td>
                                            <td>
                                                <a href="{{ route('user.show') }}" class="btn btn-info"><i class="mdi mdi-keyboard"> </i>Lihat</a>
                                                <a href="{{ route('user.edit') }}" class="btn btn-success"><i class="mdi mdi-thumb-up-outline"></i> Edit</a>
                                                <button type="button" class="btn btn-danger"><i class="mdi mdi-window-close"> Hapus</i></button>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Tiger Binleon</td>
                                            <td>089765437282</td>
                                            <td>Admin</td>
                                            <td>tigerlion@gmail.com</td>
                                            <td><button type="button" class="btn btn-info"><i class="mdi mdi-keyboard">
                                                        Lihat</i> </button>
                                                <button type="button" class="btn btn-success"><i
                                                        class="mdi mdi-thumb-up-outline"> Edit</i> </button>
                                                <button type="button" class="btn btn-danger"><i
                                                        class="mdi mdi-window-close"> Hapus</i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Tiger Binleon</td>
                                            <td>089765437282</td>
                                            <td>Admin</td>
                                            <td>tigerlion@gmail.com</td>
                                            <td><button type="button" class="btn btn-info"><i class="mdi mdi-keyboard">
                                                        Lihat</i> </button>
                                                <button type="button" class="btn btn-success"><i
                                                        class="mdi mdi-thumb-up-outline"> Edit</i> </button>
                                                <button type="button" class="btn btn-danger"><i
                                                        class="mdi mdi-window-close"> Hapus</i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Tiger Binleon</td>
                                            <td>089765437282</td>
                                            <td>Customer</td>
                                            <td>tigerlion@gmail.com</td>
                                            <td><button type="button" class="btn btn-info"><i class="mdi mdi-keyboard">
                                                        Lihat</i> </button>
                                                <button type="button" class="btn btn-success"><i
                                                        class="mdi mdi-thumb-up-outline"> Edit</i> </button>
                                                <button type="button" class="btn btn-danger"><i
                                                        class="mdi mdi-window-close"> Hapus</i> </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Tiger Binleon</td>
                                            <td>089765437282</td>
                                            <td>Customer</td>
                                            <td>tigerlion@gmail.com</td>
                                            <td><button type="button" class="btn btn-info"><i class="mdi mdi-keyboard">
                                                        Lihat</i> </button>
                                                <button type="button" class="btn btn-success"><i
                                                        class="mdi mdi-thumb-up-outline"> Edit</i> </button>
                                                <button type="button" class="btn btn-danger"><i
                                                        class="mdi mdi-window-close"> Hapus</i> </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end preview-->

                            <div class="tab-pane" id="state-saving-code">
                                <pre class="mb-0">
                                                    <span class="html escape">
                                                        &lt;table id=&quot;state-saving-datatable&quot; class=&quot;table activate-select dt-responsive nowrap w-100&quot;&gt;
                                                            &lt;thead&gt;
                                                                &lt;tr&gt;
                                                                    &lt;th&gt;Name&lt;/th&gt;
                                                                    &lt;th&gt;Position&lt;/th&gt;
                                                                    &lt;th&gt;Office&lt;/th&gt;
                                                                    &lt;th&gt;Age&lt;/th&gt;
                                                                    &lt;th&gt;Start date&lt;/th&gt;
                                                                    &lt;th&gt;Salary&lt;/th&gt;
                                                                &lt;/tr&gt;
                                                            &lt;/thead&gt;
                                                        
                                                            &lt;tbody&gt;
                                                                &lt;tr&gt;
                                                                    &lt;td&gt;Tiger Nixon&lt;/td&gt;
                                                                    &lt;td&gt;System Architect&lt;/td&gt;
                                                                    &lt;td&gt;Edinburgh&lt;/td&gt;
                                                                    &lt;td&gt;61&lt;/td&gt;
                                                                    &lt;td&gt;2011/04/25&lt;/td&gt;
                                                                    &lt;td&gt;$320,800&lt;/td&gt;
                                                                &lt;/tr&gt;
                                                                &lt;tr&gt;
                                                                    &lt;td&gt;Garrett Winters&lt;/td&gt;
                                                                    &lt;td&gt;Accountant&lt;/td&gt;
                                                                    &lt;td&gt;Tokyo&lt;/td&gt;
                                                                    &lt;td&gt;63&lt;/td&gt;
                                                                    &lt;td&gt;2011/07/25&lt;/td&gt;
                                                                    &lt;td&gt;$170,750&lt;/td&gt;
                                                                &lt;/tr&gt;
                                                            &lt;/tbody&gt;
                                                        &lt;/table&gt;
                                                    </span>
                                                </pre> <!-- end highlight-->
                            </div> <!-- end preview code-->
                        </div> <!-- end tab-content-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div> <!-- end row-->
    @endsection
