@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Data Event</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('event.add')}}"><button type="button" class="btn btn-primary">Tambah Event</button></a>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detail Event</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Judul Event</th>
                            <th>Baner Event</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach($data as $item =>$row)
                        <tr class=" align-middle">
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td class=" align-middle">{{$row->judul_event}}</td>
                            <td class=" align-middle"><img src="{{asset('fotoEvent/'.$row->gambar)}}" width="50px" height="50px" alt="gambar"> </td>
                            <td class=" align-middle">{{$row->tanggal_Mulai}}</td>
                            <td class=" align-middle">{{$row->tanggal_akhir}}</td>
                            <td class=" align-middle" colspan="2">
                                <a href="{{route('event.edit', $row->id)}}"><button type="button" class="btn btn-success">Edit</button></a>
                                <a id="delete" href="{{route('event.delete', $row->id)}}"><button type="button" class="btn btn-danger">Hapus</button></a>
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