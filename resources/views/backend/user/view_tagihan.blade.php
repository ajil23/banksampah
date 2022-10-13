@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Tagihan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Barang</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Barang</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($allDataTagihan as $tgh =>$tagihan)
                        <tr>
                            <td>{{$tagihan->id}}</td>
                            <td>{{$tagihan->nama_barang}}</td>
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