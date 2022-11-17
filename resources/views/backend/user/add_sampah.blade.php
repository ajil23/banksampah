@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Sampah</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="tambah_sampah" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="Name">Nama Sampah</label>
                        <input type="text" class="form-control form-control-lg" id="name" placeholder="Nama Sampah" name="namaSampah">
                    </div>
                    <div class="col-sm-6">
                        <label for="Satuan">Satuan</label>
                        <input type="text" class="form-control form-control-lg" id="satuan" placeholder="Satuan" name="satuan">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="Hargasatuan">Harga Satuan</label>
                        <input type="number" class="form-control form-control-lg" id="hargas" placeholder="hargaSatuan" name="hargas">
                    </div>
                </div>
                <button class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Data</span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection