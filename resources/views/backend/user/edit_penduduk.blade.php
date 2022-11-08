@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Penduduk</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{route('penduduk.update', $editPenduduk->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Name">Nama Lengkap</label>
                        <input type="text" class="form-control form-control-lg" id="nama" placeholder="Nama Lengkap" name="nama" value="{{$editPenduduk->namaLengkap}}" required>
                        <br>
                    </div>
                        
                    <div class="col-sm-6">
                        <label for="Tempat">Tempat Lahir</label>
                        <input type="text" class="form-control form-control-lg" id="tempat" placeholder="Tempat Lahir" name="tempatlahir" value="{{$editPenduduk->tmp_lahir}}" required>
                        
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control form-control-lg" id="alamat" placeholder="Alamat" name="alamat" value="{{$editPenduduk->alamat}}" required>        
                        <br>
                    </div>

                    <div class="col-sm-6">
                        <label for="Tanggal">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-lg" id="tanggal" placeholder="Tanggal Lahir" name="tanggallahir"   value="{{$editPenduduk->tgl_lahir}}" required>
                    </div>

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Jenis">Jenis Kelamin</label>
                        <input type="text" class="form-control form-control-lg" id="gender" placeholder="Jenis Kelamin" name="gender" value="{{$editPenduduk->jenis_kelamin}}" required>
                    </div>

                    <div class="col-sm-6">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control form-control-lg" id="telepon" placeholder="No Telepon" name="telepon" value="{{$editPenduduk->no_hp}}" required>    
                    </div>
                </div>
                <button class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Edit Data</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection