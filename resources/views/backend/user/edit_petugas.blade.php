@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Petugas</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{ route('petugas.update',$dataPetugas->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label>Petugas</label>
                            <select name="penduduk_id" class="form-control  @error('penduduk_id') is-invalid @enderror" id="penduduk_id" data-live-search="true">
                                <option value="">-Pilih Nama Penduduk-</option>
                                @foreach($dataPenduduk as $item)
                                <option value="{{$item->id}}" @if ($item->id == $dataPetugas->penduduk_id)
                                    selected
                                    @endif>
                                    {{$item->namaLengkap}}
                                </option>
                                @endforeach
                            </select>
                            @error('petugas_id')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>   
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username"
                        value="{{ old('username',$dataPetugas->username) }}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Name" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Pilih Tugas</label>
                        <select class="form-control form-control-lg  mb-3 mb-sm-0" name="tugas" value="{{ old($dataPetugas->role) }}" required>
                            <option>Pilih Tugas</option>
                            <option>Pengangkut</option>
                            <option>Pencatat</option>
                            <option>Penimbang</option>
                        </select>
                    </div>
                      <div class="col-sm-6 ">
                        <label for="exampleFormControlFile1">Masukan Foto</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto" accept="image/*" value="{{$dataPetugas->foto}}" required>
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
@push('js')
    <script>
        $(document).ready(function() {
            $('#penduduk_id').select2({
                theme: "bootstrap4"
            });
        });
    </script>
@endpush