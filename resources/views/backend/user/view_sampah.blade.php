@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Daftar Sampah</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('add_sampah.view')}}"><button type="button" class="btn btn-primary">Tambah Data Sampah</button></a>
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
                            <th>id</th>
                            <th>Nama Sampah</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>id</th>
                            <th>Nama Sampah</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($allDataSampah as $smp =>$sampah)
                        <tr>
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td>{{$sampah->id}}</td>
                            <td>{{$sampah->namaSampah}}</td>
                            <td>{{$sampah->satuan}}</td>
                            <td>{{$sampah->harga_satuan}}</td>
                            <td colspan="2">
                                <a href="{{route('sampah.edit', $sampah->id)}}" class="btn btn-success"> Edit </a>
                                <a id="delete" href="{{route('sampah.delete', $sampah->id)}}"><button type="button" class="btn btn-danger delete">Hapus</button></a>
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