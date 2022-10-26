@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Dawis</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{route('dawis.update', $editDawis->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Name">Nama</label>
                        <input type="text" class="form-control form-control-lg" id="name" placeholder="Name" name="nama" value="{{$editDawis->nama}}" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="Nohp">Nomor Handphone</label>
                        <input type="text" class="form-control form-control-lg" id="nohp" placeholder="No Handphone" name="no_hp" value="{{$editDawis->no_hp}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control form-control-lg" id="tmp_lahir" placeholder="Tempat lahir" name="tmp_lahir" value="{{$editDawis->tmp_lahir}}" required>
                    </div>
                    <div class="col-sm-6  mb-sm-0">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-lg" id="tgl_lahir" placeholder="Repeat Password" name="tgl_lahir" value="{{$editDawis->tgl_lahir}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                    </div>
                    <div class="col-sm-6 ">
                        <label for="exampleFormControlFile1">Masukan Foto</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto" accept="image/*" value="{{$editDawis->foto}}" required>
                    </div>
                </div>
               
                <button class="btn btn-primary btn-icon-split " style="float: right;">
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