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
                        <input type="text" required class="form-control form-control-lg" id="nama" placeholder="Nama Lengkap" name="nama">
                        <br>
                    </div>
                        
                    <div class="col-sm-6">
                        <label for="Tempat">Tempat Lahir</label>
                        <input type="text" required class="form-control form-control-lg" id="tempat" placeholder="Tempat Lahir" name="tempatlahir">
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Alamat">Alamat</label>
                        <input type="text" required class="form-control form-control-lg" id="alamat" placeholder="Alamat" name="alamat">
                        <br>
                    </div>

                    <div class="col-sm-6">
                        <label for="Tanggal">Tanggal Lahir</label>
                        <input type="date" required class="form-control form-control-lg" id="tanggal" placeholder="Tanggal Lahir" name="tanggallahir">
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="form-group">
                            <label for="Tanggal">Jenis Kelamin</label>
                            <div class="controls">
                                <select name="select" id="select" required class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="telepon">Telepon</label>
                        <input type="number" required class="form-control form-control-lg" id="telepon" placeholder="No Telepon" name="telepon">
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