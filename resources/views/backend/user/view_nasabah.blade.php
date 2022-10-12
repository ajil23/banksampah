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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <tr>
                            <td>{{$nasabah->id}}</td>
                            <td>{{$nasabah->foto}}</td>
                            <td>{{$nasabah->nama}}</td>
                            <td>{{$nasabah->no_hp}}</td>
                            <td>{{$nasabah->tgl_join}}</td>
                            <td>{{$nasabah->tgl_lahir}}</td>
                            <td>
                                <a href="{{route('edit_nasabah', $nasabah->id)}}" class="btn btn-success"> Edit </a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" c>
                                    Launch demo modal
                                </button>
                                <a href="{{route('nasabah.delete', $nasabah->id)}}"><button type="button" class="btn btn-danger delete" data-toggle="modal">Hapus</button></a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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