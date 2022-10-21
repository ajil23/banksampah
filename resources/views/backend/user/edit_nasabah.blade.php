@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Nasabah</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{route('nasabah.update', $editData->id)}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control form-control-lg" id="name" placeholder="Name" name="nama" value="{{$editData->id}}">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Name">Nama</label>
                        <input type="text" class="form-control form-control-lg" id="name" placeholder="Name" name="nama" value="{{$editData->nama}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="Nohp">Nomor Handphone</label>
                        <input type="text" class="form-control form-control-lg" id="nohp" placeholder="No Handphone" name="no_hp" value="{{$editData->no_hp}}">
                    </div>
                </div>
                <div class=" form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="tgl_join">tgl_join</label>
                        <input type="date" class="form-control form-control-lg" id="tgl_join" placeholder="Email Address" name="tgl_join" value="{{$editData->tgl_join}}">
                    </div>
                    <div class=" col-sm-6 mb-sm-0">
                        <label for="tgl_lahir">tgl_lahir</label>
                        <input type="date" class="form-control form-control-lg" id="tgl_lahir" placeholder="Repeat Password" name="tgl_lahir" value="{{$editData->tgl_lahir}}">
                    </div>
                </div>
                <div class=" form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Pilih dawis</label>
                        <select class="form-control form-control-lg  mb-3 mb-sm-0" name="iddawis" value="{{$editData->iddawis}}">
                            <option>Dawis</option>
                            @foreach($dawis as $dws =>$dawis)
                            <option value="{{$dawis->id}}">{{$dawis->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                    </div>

                </div>
                <div class=" form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Pilih Role</label>
                        <select class="form-control form-control-lg  mb-3 mb-sm-0" name="iddawis" required>
                            <option>Pilih role</option>
                            @foreach($struktur as $str =>$struktur)
                            <option value="{{$struktur->id}}">{{$struktur->jenis}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class=" col-sm-6 ">
                        <label for=" exampleFormControlFile1">Masukan Foto</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto" value="{{$editData->foto}}">
                    </div>
                </div>
                <button class=" btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Edit data</span>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection