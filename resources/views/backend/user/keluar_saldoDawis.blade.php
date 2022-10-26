@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Masuk Dawis</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{route('kurangSaldoDawis.add')}}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Pilih Nasabah</label>
                        <select class="form-control form-control-lg  mb-3 mb-sm-0" name="iddawis" required>
                            <option>Pilih dawis</option>
                            @foreach($dawis as $dws =>$dawis)
                            <option value="{{$dawis->id}}">{{$dawis->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="Nohp">Struktur</label>
                        <select class="form-control form-control-lg  mb-3 mb-sm-0" name="struktur" required>
                            <option>Pilih Role</option>
                            <option>Dawis</option>
                            <option>Nasabah</option>
                            <option>Dawis</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password">Nominal</label>
                        <input type="text" class="form-control form-control-lg" id="password" placeholder="Nominal" name="nominal">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control form-control-lg" id="keterangan" placeholder="Keterangan" name="keterangan_keluar">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="tgl_join">Tanggal Keluar</label>
                        <input type="date" class="form-control form-control-lg" id="tgl_join" placeholder="Email Address" name="tgl_tagihan" required>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="tgl_tempo">Tanggal Tempo</label>
                        <input type="date" class="form-control form-control-lg" id="tgl_tempo" placeholder="Email Address" name="tgl_tempo" required>
                    </div>
                </div>
                <button class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection