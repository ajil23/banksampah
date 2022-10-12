@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Dawis</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('add_dawis.view')}}"><button type="button" class="btn btn-primary">Tambah Data Dawis</button></a>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data dawis</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>no Handphone</th>
                            <th>Tempat lahir</th>
                            <th>Tanggal lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>no Handphone</th>
                            <th>Tempat lahir</th>
                            <th>Tanggal lahir</th>
                            <th>Aksi</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($dawis as $dws =>$dawis)
                        <tr>
                            <td>{{$dawis->id}}</td>
                            <td>{{$dawis->foto}}</td>
                            <td>{{$dawis->nama}}</td>
                            <td>{{$dawis->no_hp}}</td>
                            <td>{{$dawis->tmp_lahir}}</td>
                            <td>{{$dawis->tgl_lahir}}</td>
                            <td>
                                <a href="#" class="btn btn-success"> Edit </a>
                                <a href="{{route('dawis.delete', $dawis->id)}}"><button type="button" class="btn btn-danger">Hapus</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
@endsection