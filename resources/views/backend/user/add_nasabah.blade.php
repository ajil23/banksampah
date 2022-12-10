@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Nasabah</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST" action="{{ route('nasabah.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label>Nasabah</label>
                            <select name="penduduk_id" class="form-control  @error('penduduk_id') is-invalid @enderror"
                                id="penduduk_id" data-live-search="true">
                                <option value="">-Pilih Nama Penduduk-</option>
                                @foreach ($dataPenduduk as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->namaLengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('penduduk_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                         <div class="col-sm-6">
                            <input  type="text" class="form-control  " value="{{$kd}}"
                                name="user_id" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="username">Username</label>
                            <input type="number" class="form-control form-control"  id="username" placeholder="Username"
                                name="username">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control"  id="password" placeholder="Name"
                                name="password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 ">
                            <label for="exampleFormControlFile1">Masukan Foto</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"
                                accept="image/*" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-icon-split">
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

@push('js')
    <script>
        $(document).ready(function() {
            $('#penduduk_id').select2({
                theme: "bootstrap4"
            });
        });
    </script>
@endpush
