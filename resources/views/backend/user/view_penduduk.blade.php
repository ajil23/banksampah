@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Daftar Penduduk</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('tambahPenduduk.view')}}"><button type="button" class="btn btn-primary">Tambah Penduduk</button></a>
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
                            <th>Nama Lengkap</th>
                            <th>Tempat</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Gender</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allDataPenduduk as $pdk =>$penduduk)
                        <tr>
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td>{{$penduduk->namaLengkap}}</td>
                            <td>{{$penduduk->tmp_lahir}}</td>
                            <td>{{$penduduk->tgl_lahir}}</td>
                            <td>{{$penduduk->alamat}}</td>
                            <td>{{$penduduk->jenis_kelamin}}</td>
                            <td>{{$penduduk->no_hp}}</td>
                            <td colspan="2">
                                <a href="{{route('penduduk.edit', $penduduk->id)}}" class="btn btn-success"> Edit </a>
                                <a id="delete" href="{{route('penduduk.delete', $penduduk->id)}}"><button type="button" class="btn btn-danger delete">Hapus</button></a>
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