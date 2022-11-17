@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Tabel Data Transaksi</h1>
            </div>
            <div class="col">
                <a href="#"><button type="button" class="btn btn-success">Eksport ke excel</button></a>
            </div>

            <div class="co ">
                <a href="{{route('page.masuk')}}"><button type="button" class="btn btn-primary">Tambah</button></a>
               
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
                            <th>Keterangan Pembelian</th>
                            <th>Nominal</th>
                            <th>Tanggal Transaksi</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Keterangan Pembelian</th>
                            <th>Nominal</th>
                            <th>Tnggal Transaksi</th>
                            <th>Detail</th>
                        </tr>
                    </tfoot>
                    <tbody>
                       @foreach($riwayat as $key =>$riwayat)
                        <tr>
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td>{{$riwayat->nasabah->penduduk->namaLengkap}}</td>
                            <td>{{$riwayat->keterangan_masuk}}</td>
                            <td>{{$riwayat->nominal}}</td>
                            <td>{{$riwayat->created_at}}</td>
                            <td colspan="2">
                                <a href="#" class="btn btn-success"> Detail </a>
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