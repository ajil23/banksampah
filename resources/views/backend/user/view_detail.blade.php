@extends('admin.admin_master')

@section('admin')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Detail riwayat</h1>
                </div>
            </div>
        </div>
        <!-- DataTales Example -->
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card  mb-3 bg-success text-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Nama Nasabah</h6>
                            </div>
                            <div class="col-sm-6">
                                {{ $data->nasabah->penduduk->namaLengkap }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Nama Dawiss</h6>
                            </div>
                            <div class="col-sm-6">
                                {{ $data->dawis->nasabah->penduduk->namaLengkap}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0">Nama Petugas</h6>
                            </div>
                            <div class="col-sm-6">
                                  {{ $data->petugas->penduduk->namaLengkap}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Riwayat</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>no</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Sub Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data->detail as $data)
                                <tr class=" align-middle">
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class=" align-middle">{{ $data->sampah->namaSampah }}</td>
                                    <td class=" align-middle">{{ $data->berat }}</td>
                                    <td class=" align-middle">Rp. {{ $data->harga_satuan }}</td>
                                    <td class=" align-middle">Rp. {{ $data->sub_harga }}</td>
                                </tr>
                            @endforeach
                            <tr class=" align-middle">
                                <td colspan="3" class=" align-middle">Total Keseluruhan</td>
                                <td colspan="2" class=" align-middle">Rp. {{ $riwayat->nominal }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
