@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Tambah Kelompok Nasabah</h1>
                </div>

            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <form action="{{ route('kelompok.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label>Dawis</label>
                            <select name="iddawis" class="form-control  @error('iddawis') is-invalid @enderror"
                                id="dawis_id" data-live-search="true">
                                <option value="">-Pilih Nama Dawis-</option>
                                @foreach ($dawis as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->nasabah->penduduk->namaLengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('iddawis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered " width="90%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nasabah</th>
                                </tr>
                            </thead>
                            <tbody class="add-more-product">
                                <tr>
                                    <td>
                                        <select
                                            class="form-control form-control-nasabah nasabahid @error('idnasabah') is-invalid @enderror"
                                            id="nasabah_id" name="idnasabah[]" multiple="multiple">
                                            @foreach ($nasabah as $nsb => $nasabah)
                                                <option value="{{ $nasabah->id }}">{{ $nasabah->penduduk->namaLengkap }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('idnasabah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary"style="float: right">Masukan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#dawis_id').select2({
                theme: "bootstrap4"
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#nasabah_id').select2({
                theme: "bootstrap4",
                placeholder: 'Pilih Nasabah'
            });
        });
    </script>
@endpush
