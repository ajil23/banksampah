@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Nasabah</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('add_nasabah.view')}}"><button type="button" class="btn btn-primary">Tambah Data Nasabah</button></a>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Nasabah</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>no Handphone</th>
                            <th>Tanggal Join</th>
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
                            <th>Tanggal Join</th>
                            <th>Tanggal lahir</th>
                            <th>Aksi</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($nasabah as $nsb =>$nasabah)
                        <tr class=" align-middle">
                            <td class="align-middle">{{$nasabah->id}}</td>
                            <td><img src="{{asset('storage/fotoNasabah/'.$nasabah->foto)}}" alt="" width="70px"></td>
                            <td class="align-middle">{{$nasabah->nama}}</td>
                            <td class="align-middle">{{$nasabah->no_hp}}</td>
                            <td class="align-middle">{{$nasabah->tgl_join}}</td>
                            <td class="align-middle">{{$nasabah->tgl_lahir}}</td>
                            <td class="align-middle">
                                <a href="{{route('edit_nasabah', $nasabah->id)}}" class="btn btn-success"> Edit </a>
                                <!-- Button trigger modal -->

                                <a href="{{route('nasabah.delete', $nasabah->id)}}" id="delete"><button type="button" class="btn btn-danger delete" >Hapus</button></a>

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