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
                                    <td class=" align-middle">{{ $data->harga_satuan }}</td>
                                    <td class=" align-middle">{{ $data->sub_harga }}</td>
                                </tr>
                            @endforeach
                            <tr class=" align-middle">
                                <td colspan="3" class=" align-middle">Total Keseluruhan</td>
                                <td colspan="2" class=" align-middle">{{ $riwayat->nominal }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
@endsection
