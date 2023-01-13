@extends('admin.admin_master')
@section('admin')


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Nasabah</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{ route('nasabah.update',$dataNasabah->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Nasabah</label>
                            <select name="penduduk_id" class="form-control  @error('penduduk_id') is-invalid @enderror" id="penduduk_id" data-live-search="true">
                                <option value="">-Pilih Nama Penduduk-</option>
                                @foreach($dataPenduduk as $item)
                                <option value="{{$item->id}}" @if ($item->id == $dataNasabah->penduduk_id)
                                    selected
                                    @endif>
                                    {{$item->namaLengkap}}
                                </option>
                                @endforeach
                            </select>
                            @error('nasabah_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>   
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label>Dawis</label>
                            <select name="dawis_id" class="form-control  @error('dawis_id') is-invalid @enderror" id="dawis_id" data-live-search="true">
                                <option value="">-Pilih Nama Dawis-</option>
                                @foreach($dataDawis as $item)
                                <option value="{{$item->id}}" @if ($item->id == $dataNasabah->dawis_id)
                                    selected
                                    @endif>
                                    {{$item->nasabah->penduduk->namaLengkap}}
                                </option>
                                @endforeach
                            </select>
                            @error('dawis_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>   
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 ">
                        <label for="exampleFormControlFile1">Masukan Foto</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto" accept="image/*" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Update Data</span>
                </button>
            </form>
        </div>
    </div>
</div>


@endsection