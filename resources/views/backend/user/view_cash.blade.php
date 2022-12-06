@extends('admin.admin_master')
@section('admin')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Data Cash</h1>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Detail Cash</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>Nama Nasabah</th>
                            <th>Keterangan Masuk</th>
                            <th>Nominal</th>
                            <th>Tanggal Masuk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach($data as $item =>$row)
                        <tr class=" align-middle">
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td class=" align-middle">{{$row->nasabah->penduduk->namaLengkap}}</td>
                            <td class=" align-middle">{{$row->keterangan_cash}}</td>
                            <td class=" align-middle">{{$row->nominal}}</td>
                            <td class=" align-middle">{{$row->created_at}}</td>
                            <td class=" align-middle">
                                <a href="{{route('strukTagihan.view', $row->id)}}"><button type="button" class="btn btn-success">Struk</button></a>
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