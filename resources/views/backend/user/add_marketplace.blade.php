@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Barang</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST" action="{{route('marketplace.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="name">Judul Barang</label>
                            <input type="text"
                                class="form-control form-control-lg @error('judul') is-invalid @enderror"
                                id="name" placeholder="Nama Barang" name="judul">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control form-control-lg @error('harga') is-invalid @enderror"
                                id="harga" placeholder="Harga" name="harga">
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="gambar">Foto Barang</label>
                            <input type="file" class="form-control-file @error('gambar') is-invalid @enderror"
                                id="gambar" name="gambar" accept="image/*">
                            @error('gambar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="link">No Wa</label>
                            <input type="text" class="form-control form-control-lg @error('no_wa') is-invalid @enderror"
                                id="link" placeholder="No WA{ubah 0 menjadi 62. etc=6287821234658}" name="no_wa">
                            @error('no_wa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
