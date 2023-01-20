@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Data Marketplace</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('marketplace.add')}}"><button type="button" class="btn btn-primary">Tambah Barang</button></a>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detail Barang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Judul Barang</th>
                            <th>Foto Barang</th>
                            <th>Harga</th>
                            <th>Tanggal Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach($data as $item =>$row)
                        <tr class=" align-middle">
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td class=" align-middle">{{$row->judul}}</td>
                            <td class=" align-middle"><img src="{{asset('fotoBarang/'.$row->gambar)}}" width="50px" height="50px" alt="gambar"> </td>
                            <td class=" align-middle">{{$row->harga}}</td>
                            <td class=" align-middle">{{$row->created_at}}</td>
                            <td class=" align-middle" colspan="2">
                                <a href="{{route('marketplace.edit', $row->id)}}"><button type="button" class="btn btn-success">Edit</button></a>
                                <a id="delete" href="{{route('marketplace.delete', $row->id)}}"><button type="button" class="btn btn-danger">Hapus</button></a>
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