@extends('admin.admin_master')
@section('admin')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Sampah</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sampah</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Sampah</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tiger Nixon</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Garrett Winters</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ashton Cox</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Cedric Kelly</td>
                            <td>$433,060</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Airi Satou</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Brielle Williamson</td>
                            <td>$372,000</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Herrod Chandler</td>
                            <td>$137,500</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection