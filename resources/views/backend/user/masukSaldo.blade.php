@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Saldo Masuk</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{route('masuk.saldo', $masuk->id)}}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Name">Struktur</label>
                        <select class="form-control form-control-lg  mb-3 mb-sm-0" name="struktur" required>
                            <option>Pilih Struktur</option>
                            <option>Nasabah</option>
                            <option>Dawis</option>
                            <option>petugas</option>
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Nama</label>
                        <select class="form-control form-control-lg  mb-3 mb-sm-0" name="iddawis" required>
                            <option>Pilih Dawis</option>
                            @foreach($dawis as $dws =>$dawis)
                            <option value="{{$dawis->id}}">{{$dawis->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Name" name="password">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="tgl_join">tgl_join</label>
                        <input type="date" class="form-control form-control-lg" id="tgl_join" placeholder="Email Address" name="tgl_join" required>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-sm-6  mb-sm-0">
                        <label for="tgl_lahir">tgl_lahir</label>
                        <input type="date" class="form-control form-control-lg" id="tgl_lahir" placeholder="Repeat Password" name="tgl_lahir" required>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Pilih dawis</label>
                        <select class="form-control form-control-lg  mb-3 mb-sm-0" name="iddawis" required>
                            <option>Pilih Dawis</option>
                            @foreach($dawis as $dws =>$dawis)
                            <option value="{{$dawis->id}}">{{$dawis->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-sm-6 ">
                        <label for="exampleFormControlFile1">Masukan Foto</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto" accept="image/*" required>
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