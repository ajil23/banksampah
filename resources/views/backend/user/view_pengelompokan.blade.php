@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Daftar Dawis Dan Nasabah</h1>
            </div>
            <div class="co text-end mb-2">
                <a href="{{route('kelompok.add')}}"><button type="button" class="btn btn-primary">Tambah Penduduk</button></a>
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
                            <th>Nama Dawis</th>
                            <th>Nama Nasabah</th>
                            <th>Kode Dawis</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allDataKelompok as $klk =>$kelompok)
                        <tr>
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td>{{$kelompok->dawis->nasabah->penduduk->namaLengkap}}</td>
                            <td>{{$kelompok->nasabah->penduduk->namaLengkap}}</td>
                            <td>{{$kelompok->dawis->kode}}</td>
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