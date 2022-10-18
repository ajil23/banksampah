@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Detail Tagihan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Saldo</th>
                            <th>Tanggal Masukan</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Saldo</th>
                            <th>Tanggal Masukan</th>
                            <th>Tambah</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($danaMasuk as $nsb =>$nasabah)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$nasabah->id}}</td>
                            <td>{{$nasabah->nama}}</td>
                            <td>{{$nasabah->tgl_masukan}}</td>
                            <td>Rp. {{number_format($nasabah->nominal)}}</td>
                            <td><a href="{{route('page.masuk', $nasabah->id)}}" class="btn btn-success"> Edit </a></td>
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