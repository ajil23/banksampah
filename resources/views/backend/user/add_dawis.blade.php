@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dawis</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="tambah_dawis" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Kode">Kode</label>
                        <input type="text" class="form-control form-control-lg" placeholder="Kode" name="kode" required>
                    </div>
                    <div class="col-sm-6">
                        <label>Nasabah</label>
                            <select name="nasabah_id" class="form-control  @error('nasabah_id') is-invalid @enderror" id="barang">
                                <option value="">-Pilih Nasabah-</option>
                                @foreach($data_nasabah as $item)
                                <option value="{{$item->id}}">
                                    {{$item->penduduk->namaLengkap}}
                                </option>
                                @endforeach
                            </select>
                            @error('nasabah_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                </div>
                <!-- {{-- <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Name" name="password">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control form-control-lg" id="tmp_lahir" placeholder="Tempat lahir" name="tmp_lahir" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6  mb-sm-0">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-lg" id="tgl_lahir" placeholder="Repeat Password" name="tgl_lahir" required>
                    </div>
                    <div class="col-sm-6 ">
                        <label for="exampleFormControlFile1">Masukan Foto</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto" accept="image/*" required>
                    </div>
                </div> --}} -->
                <button class="btn btn-primary btn-icon-split " style="float: right;">
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