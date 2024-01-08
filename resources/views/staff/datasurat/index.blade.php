@extends('layouts.master')
@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Table Surat</h1>
            <div class="section-header-breadcrumb"> 
              <div class="breadcrumb-item"><a href="#">Data Surat</a></div>
              <div class="breadcrumb-item">Table</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">Data Surat</h2>
            <p class="section-lead">List data Surat</p>

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
                            <a href="{{ route('datasurat.create') }}" class="btn btn-info">Tambah</a>
                            <a href="{{ route('staff.export') }}" class="btn btn-primary">Export</a>

                    </div>
                  </div>

                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table  class="table table-striped" style="width:100%" id="data-table"  cellspacing="0">

                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nomor Surat</th>
                            <th>Perihal</th>
                            <th>Tanggal Keluar</th>
                            <th>Penerima Surat</th>
                            <th>Notulis</th>
                            <th>Hasil Rapat</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach ($datasurat as $data)
                          <tr>
                           <td>  {{ $loop->iteration }}</td>
                            <td>{{ $data->letter_code }}</td>
                            <td>{{ $data->name_type }}</td>
                            <td>
                            <form action="{{ route('datasurat.destroy',$data->id) }}" method="POST">
                                <a class="btn btn-success" href="{{ route('datasurat.edit',$data->id) }}">Edit</a>
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
     <script>
        $(document).ready(function () {
    $('#data-table').DataTable();
});
     </script>
@endsection
