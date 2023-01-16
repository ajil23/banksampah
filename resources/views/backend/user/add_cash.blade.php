@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Cash Nasabah</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST" action="{{ route('cash.add') }}">
                    @csrf
                    <div class="form-group row">

                        <div class="col-sm-6 mb-sm-0">
                            <label>Nasabah</label>
                            <select name="nasabah_id" class="form-control  @error('nasabah_id') is-invalid @enderror"
                                id="nasabah">
                                <option value="">-Pilih Nasabah-</option>
                                @foreach ($data_nasabah as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->penduduk->namaLengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nasabah_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="keterangan_cash">Keterangan Cash</label>
                            <input type="text"
                                class="form-control form-control @error('keterangan_cash') is-invalid @enderror"
                                placeholder="keterangan_cash" name="keterangan_cash">
                            @error('keterangan_cash')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="nominal">Nominal</label>
                            <input type="text" class="form-control form-control @error('nominal') is-invalid @enderror"
                                id="nominal" placeholder="Nominal" name="nominal">
                            @error('nominal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
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
@push('js')
    <script>
        $(document).ready(function() {
            $('#nasabah').select2({
                theme: "bootstrap4"
            });
        });
    </script>
@endpush
