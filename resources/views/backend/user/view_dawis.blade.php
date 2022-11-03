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
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Kode</th>
                            <th>Nama Dawis</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>no</th>
                            <th>Kode</th>
                            <th>Nama Dawis</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data_dawis as $item =>$row)
                        <tr class=" align-middle">
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td class=" align-middle">{{$row->kode}}</td>
                            <td class=" align-middle">{{$row->nasabah->nama}}</td>
                            <td class=" align-middle">{{$row->nasabah->no_hp}}</td>
                            <td class=" align-middle">
                                <a href="{{route('dawis.edit', $row->id)}}" class="btn btn-success"> Edit </a>
                                <a href="{{route('dawis.delete', $row->id)}}" id="delete"><button type="button" class="btn btn-danger delete">Hapus</button></a>
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