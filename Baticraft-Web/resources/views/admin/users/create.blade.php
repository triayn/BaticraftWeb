@extends('admin.layouts.main')
@section ('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="index">Pengguna</a></li>
                    <li class="breadcrumb-item active">Tambah Pengguna</li>
                </ol>
            </div>
            <h4 class="page-title">Tambah Pengguna</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><center>Formulir Tambah Pengguna</center></h4>
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#label-sizing-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        </a>
                    </li>
                </ul> <!-- end nav-->
                <div class="tab-content">
                    <div class="tab-pane show active" id="label-sizing-preview">
                        <form>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama Lengkap</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Nama Lengkap">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No. Telepon</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="No. Telepon">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Alamat</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Alamat">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input type="radio" id="customRadio1" name="customRadio" class="form-check-input">
                                        <label class="form-check-label" for="customRadio1">Laki-laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="customRadio2" name="customRadio" class="form-check-input">
                                        <label class="form-check-label" for="customRadio2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tempat Lahir</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="colFormLabelSm" placeholder="Tempat Lahir">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="example-date" type="date" name="date">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Role</label>
                                <div class="col-sm-10">
                                    <select class="form-select form-select-sm mb-3">
                                        <option value="1">Laki-laki</option>
                                        <option value="2">Perempuan</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                                <div class="col-sm-10">
                                <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="example@gmail.com">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" placeholder="Password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Foto</label>
                                <div class="col-sm-10">
                                    <div class="mb-3">
                                        <input type="file" id="example-fileinput" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                </div>
                            </div>
                        </form>                                        
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection