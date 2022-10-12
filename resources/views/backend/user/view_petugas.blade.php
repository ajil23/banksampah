@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Petugas</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('add_petugas.view')}}"><button type="button" class="btn btn-primary">Tambah Data Petugas</button></a>
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

                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis Tugas</th>
                            <th>no Handphone</th>
                            <th>Tempat lahir</th>
                            <th>Tanggal lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Jenis Tugas</th>
                            <th>no Handphone</th>
                            <th>Tempat lahir</th>
                            <th>Tanggal lahir</th>
                            <th>Aksi</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($petugas as $pts =>$petugas)
                        <tr class=" align-middle">
                            <td><img src="{{asset('storage/fotoPetugas/'.$petugas->foto)}}" alt="" width="70px"></td>
                            <td class=" align-middle">{{$petugas->nama}}</td>
                            <td class=" align-middle">{{$petugas->tugas}}</td>
                            <td class=" align-middle">{{$petugas->no_hp}}</td>
                            <td class=" align-middle">{{$petugas->tmp_lahir}}</td>
                            <td class=" align-middle">{{$petugas->tgl_lahir}}</td>
                            <td class=" align-middle">
                                <a href="{{route('edit_petugas', $petugas->id)}}" class="btn btn-success"> Edit </a>
                                <a href="{{route('petugas.delete', $petugas->id)}}" id="delete"><button type="button" class="btn btn-danger delete">Hapus</button></a>
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