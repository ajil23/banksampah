@extends('admin.admin_master')
@section('admin')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Event</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label for="name">Judul Event</label>
                            <input type="text"
                                class="form-control form-control-lg @error('judul_event') is-invalid @enderror"
                                id="name" placeholder="Judul Event" name="judul_event">
                            @error('judul_event')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="exampleFormControlTextarea1">Deskripsi</label>
                            <textarea class="form-control  @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" name="deskripsi" rows="3"></textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 ">
                            <label for="tanggal_Mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control form-control-lg @error('tanggal_Mulai') is-invalid @enderror"
                                id="tanggal_Mulai"  name="tanggal_Mulai">
                            @error('tanggal_Mulai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" class="form-control form-control-lg @error('tanggal_akhir') is-invalid @enderror"
                                id="tanggal_akhir"  name="tanggal_akhir">
                            @error('tanggal_akhir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                         <div class="col-sm-6">
                            <label for="gambar">Foto Banner</label>
                            <input type="file" class="form-control-file @error('gambar') is-invalid @enderror"
                                id="gambar" name="gambar" accept="image/*">
                            @error('gambar')
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
