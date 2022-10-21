@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Tabungan</h1>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Struktur</th>
                            <th>Saldo</th>
                        </tr>
                    </tfoot>
                    <tbody class="text-center">
                        <tr class="text-center">
                            <td>1</td>
                            <td>Muhammad Zaynudin</td>
                            <td>Nasabah</td>
                            <td>Rp 320,800</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection