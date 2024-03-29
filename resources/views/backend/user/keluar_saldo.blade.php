@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid" id="coba">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Masuk Dawis</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST" action="{{ route('kurangSaldo.add') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="">Pilih Nasabah</label>
                            <select
                                class="form-control form-control  mb-3 mb-sm-0 @error('nasabah_id') is-invalid @enderror"
                                name="nasabah_id" id="nasabah_id">
                                <option value="">Pilih Nasabah</option>
                                @foreach ($nasabah as $nsb => $nasabah)
                                    <option value="{{ $nasabah->id }}">{{ $nasabah->penduduk->namaLengkap }}</option>
                                @endforeach
                            </select>
                            @error('nasabah_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="Nohp">Keterangan Transaksi</label>
                            <input type="text"
                                class="form-control form-control @error('keterangan_pembelian') is-invalid @enderror"
                                id="password" placeholder="Keterangan Transaksi" name="keterangan_pembelian">
                            @error('keterangan_pembelian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="password">Nominal</label>
                            <input type="text" class="form-control form-control @error('nominal') is-invalid @enderror"
                                id="password" placeholder="Nominal" name="nominal">
                            @error('nominal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
@push('js')
    <script>
        $(document).ready(function() {
            $('#nasabah_id').select2({
                theme: "bootstrap4"
            });
        });
    </script>
@endpush
