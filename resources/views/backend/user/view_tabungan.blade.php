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
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody class="text-center">
                        <tr class="text-center">
                            <td>1</td>
                            <td style="width: 400px;">Tiger Nixon</td>
                            <td style="width: 300px;">$320,800</td>
                            <td class="text-center">
                                <div class="row">
                                    <div class="col">
                                        <button type="button" class="btn btn-danger">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-minus"></i>
                                            </span>
                                            <span class="text">Keluar</span>
                                        </button>
                                    </div>
                                    <div class="col ">
                                        <button type="button" class="btn btn-success">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                            <span class="text">Masuk</span>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection