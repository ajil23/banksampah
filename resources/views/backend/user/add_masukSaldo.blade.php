@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Petugas</h1>
                </div>
                <div class="co">
                    <button name="add" class="btn btn-success add-more">Tambah Data</button>
                </div>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <form action="{{route('saldo.add')}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label>Nasabah</label>
                            <select name="idnasabah" class="form-control  @error('penduduk_id') is-invalid @enderror"
                                id="penduduk_id" data-live-search="true">
                                <option value="">-Pilih Nama Penduduk-</option>
                                @foreach ($nasabah as $item)
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
                            <label for="">Kode Transaksi</label>
                           <input type="text" class="form-control form-control" id="tmp_lahir" readonly value="{{$kd}}" name="kode_id" required>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table name="cart" class="table table-bordered text-center" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Jenis Sampah</th>
                                    <th>Berat/Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody  class="add-more-product">
                                <tr name="line_items">
                                    <td>
                                        <select class="form-control form-control sampahid" name="idsampah[]"  >
                                            <option value="">Pilih Sampah</option>
                                            @foreach ($sampah as $smp => $sampah)
                                                <option harga="{{ $sampah->harga_satuan }}" value="{{ $sampah->id }}">{{ $sampah->namaSampah }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control form-control berat"  name="berat[]"></td>
                                    <td id="detail-harga"><input type="text" readonly  class="form-control form-control harga" name="harga_satuan[]"></td>
                                    <td>
                                        <input type="text" class="form-control form-control sub_total" readonly name="sub_harga[]" aria-describedby="inputGroup-sizing-sm">
                                    </td>
                                    <td><button type="button" name="remove" class="btn btn-danger">Hapus</button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody>
                                 <tr>
                                    <td colspan="2">Subtotal</td>
                                    <td colspan="2"><input type="text" name="total" readonly class="form-control form-control total" /></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary"> Masukan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="{{ asset('calc/js/scriptTransaksi.js') }}"></script>
     <script>
        $(document).ready(function() {
            $('#penduduk_id').select2({
                theme: "bootstrap4"
            });
        });
    </script>
@endpush
