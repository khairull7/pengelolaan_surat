@extends('layouts.master')
@section('content')
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{route('user.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Data User</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">User</a></div>
              <div class="breadcrumb-item">Edit</div>
            </div>
          </div>
        @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
             <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
             @csrf
            @method('PUT')
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama User</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="name" value="{{$user->name}}" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">email</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="email" value="{{$user->email}}" class="form-control">
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">password</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="password" class="form-control">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="role" id="role"  required>
                           <option value="{{ old('role', $user->role) }}" >{{$user->role}}</option>
                           {{-- <option value="{{ old('role', $user->role) }}" >Petugas</option>
                           <option value="{{ old('role', $user->role) }}" >Siswa</option> --}}
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Kirim</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        </section>
      </div>
@endsection
