{{-- @extends('layouts.master')
@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table User</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">User</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data User</h2>
            <p class="section-lead">List data staff dan guru</p>
            <div role="alert">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            </div>
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
            }, 3000);
            </script>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Sortable Table</h4>
                    <div class="card-header-action">
                            <a href="{{ route('user.create') }}" class="btn btn-info">Tambah</a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped" id="sortable-table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>email</th>
                            <th>Role</th>
                            <th >Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($user as $data)
                          <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->role }}</td>
                            <td>
                            <form action="{{ route('user.destroy',$data->id) }}" method="POST">
                                <a class="btn btn-success" href="{{ route('user.edit',$data->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </form>
                            </td>
                          </tr>
                         @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@endsection --}}



@extends('layouts.master')
@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table User</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">User</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data User</h2>
            <p class="section-lead">List data Staff dan Guru</p>

            <div role="alert">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            </div>
            <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
                });
            }, 1000);
            </script>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Sortable Table</h4>
                    <div class="card-header-action">
                            <a href="{{ route('user.create') }}" class="btn btn-info">Tambah</a>
                    </div>
                  </div>

                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table  class="table table-striped" style="width:100%" id="data-table"  cellspacing="0">

                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>email</th>
                            <th>Role</th>
                            <th >Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($user as $data)
                          <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->role }}</td>
                            <td>
                            <form action="{{ route('user.destroy',$data->id) }}" method="POST">
                                <a class="btn btn-success" href="{{ route('user.edit',$data->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" href="{{ route('user.destroy',$data->id) }}">delete</button>
                            </form>
                            </td>
                          </tr>
                         @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
     <script>
        $(document).ready(function () {
    $('#data-table').DataTable();
});
     </script>
@endsection

