@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Penduduk</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST" action="pendudukBaru" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="Name">Nama Lengkap</label>
                            <input type="text" class="form-control form-control-lg  @error('nama') is-invalid @enderror"
                                id="nama" placeholder="Nama Lengkap" name="nama">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <br>
                        </div>

                        <div class="col-sm-6">
                            <label for="Tempat">Tempat Lahir</label>
                            <input type="text"
                                class="form-control form-control-lg  @error('tempatlahir') is-invalid @enderror"
                                id="tempat" placeholder="Tempat Lahir" name="tempatlahir">
                            @error('tempatlahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="Alamat">Alamat</label>
                            <input type="text"
                                class="form-control form-control-lg  @error('alamat') is-invalid @enderror" id="alamat"
                                placeholder="Alamat" name="alamat">
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <br>
                        </div>

                        <div class="col-sm-6">
                            <label for="Tanggal">Tanggal Lahir</label>
                            <input type="date"
                                class="form-control form-control-lg  @error('tanggallahir') is-invalid @enderror"
                                id="tanggal" placeholder="Tanggal Lahir" name="tanggallahir">
                            @error('tanggallahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <div class="form-group">
                                <label for="Tanggal">Jenis Kelamin</label>
                                <div class="controls">
                                    <select name="select" id="select"
                                        class="form-control form-control-lg  @error('select') is-invalid @enderror">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    @error('select')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="telepon">Telepon</label>
                            <input class="form-control form-control-lg  @error('telepon') is-invalid @enderror"
                                id="telepon" placeholder="Nomor Telepon" name="telepon">
                            @error('telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Penduduk</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
