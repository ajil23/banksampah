@extends('admin.admin_master')
@section('admin')


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Password Petugas</h6>
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{ route('passwordPetugas.update',$dataUser->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username"
                        value="{{ old('username',$dataUser->email) }}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="password">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Name" name="password">
                    </div>
                </div>

               
                <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Ubah Password</span>
                </button>
            </form>
        </div>
    </div>
</div>


@endsection