@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Tabel Data Keluar Dawis</h1>
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
                        <li><a class="dropdown-item" href="{{route('kurangSaldoDawis.view')}}">Dawis</a></li>
                        <li><a class="dropdown-item" href="#">Nasabah</a></li>
                        <li><a class="dropdown-item" href="#">Petugas</a></li>
                    </ul>
                </div>
            </div>
            <div class="co ">
                <a href="{{route('keluarSaldoDawis.view')}}"><button type="button" class="btn btn-primary">Tambah Data Keluar</button></a>
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
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Struktur</th>
                            <th>Keterangan Keluar</th>
                            <th>Dana Keluar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Zaynudin</td>
                            <td>Nasabah</td>
                            <td>Dana Dari Pemasukan Sampah</td>
                            <td>Rp 30.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection