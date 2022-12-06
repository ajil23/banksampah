@extends('admin.admin_master')
@section('admin')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Keluar Dawis</h1>
                </div>
                <div class="col">
                    <a href="{{ route('keluaran.export') }}"><button type="button" class="btn btn-success">Eksport ke
                            excel</button></a>
                </div>

                <div class="co ">
                    <a href="{{ route('keluarSaldo.view') }}"><button type="button" class="btn btn-primary">Tambah Data
                            Keluar</button></a>
                </div>
            </div>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan Keluar</th>
                                <th>Nominal</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Keterangan Keluar</th>
                                <th>Nominal</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($transaksi as $key => $transaksi)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td>{{ $transaksi->nasabah->penduduk->namaLengkap }}</td>
                                    <td>{{ $transaksi->keterangan_pembelian }}</td>
                                    <td>Rp. {{ $transaksi->nominal }}</td>
                                    <td>{{ $transaksi->tgl_transaksi }}</td>
                                    <td>
                                        <a href="{{ route('strukSaldo.view', $transaksi->id) }}" class="btn btn-success">
                                            Struk </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
