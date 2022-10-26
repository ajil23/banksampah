@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Tabel Data Masuk Nasabah</h1>
            </div>
            <div class="col">
                <a href="#"><button type="button" class="btn btn-success">Eksport ke excel</button></a>
            </div>
            <div class="col">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Role Struktur
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{route('tagihan.view')}}">Dawis</a></li>
                        <li><a class="dropdown-item" href="{{route('tambahSaldoNasabah.view')}}">Nasabah</a></li>
                        <li><a class="dropdown-item" href="{{route('saldoPetugas.view')}}">Petugas</a></li>
                    </ul>
                </div>
            </div>
            <div class="co ">
                <a href="{{route('tambahSaldoPetugas.add')}}"><button type="button" class="btn btn-primary">Tambah Data Masuk</button></a>
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
                            <th>Nama</th>
                            <th>Struktur</th>
                            <th>Keterangan Masuk</th>
                            <th>Dana Masuk</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Struktur</th>
                            <th>Keterangan Masuk</th>
                            <th>Dana Masuk</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($danaMasuk as $tgh =>$tagihan)
                        <tr>
                            <td>{{$tagihan->id}}</td>
                            <td>{{$tagihan->nama}}</td>
                            <td>{{$tagihan->struktur}}</td>
                            <td>Dana Dari Sampah</td>
                            <td>{{$tagihan->nominal}}</td>
                            <td>{{$tagihan->tgl_masukan}}</td>
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