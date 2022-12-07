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
                            <th>no</th>
                            <th>Username</th>
                            <th>Foto</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($dataNasabah as $item =>$row)
                        <tr class=" align-middle">
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td class=" align-middle">{{$row->user->email}}</td>
                            <td>
                                <img src="{{asset('fotoNasabah/'.$row->foto)}}" width="50px" height="50px" alt="gambar"> 
                            </td>
                            <td class=" align-middle">{{$row->penduduk->namaLengkap}}</td>
                            <td class=" align-middle">{{$row->tgl_daftar}}</td>
                            <td class=" align-middle">
                                <a href="{{route('user.edit', $row->user_id)}}" class="btn btn-warning"> Edit Paswword </a>
                                <a href="{{route('nasabah.edit', $row->id)}}" class="btn btn-success"> Edit </a>
                                <a href="{{route('nasabah.delete', $row->user_id)}}" id="delete"><button type="button" class="btn btn-danger delete">Hapus</button></a>
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