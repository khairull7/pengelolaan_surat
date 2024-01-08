
@extends('layouts.main')
@section('title', '| Main Guru')

@section('content')
@if (Session::get('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<h2 class="mb-3">Restore Data Surat</h2>

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
      {{-- <li class="breadcrumb-item"><a href="#">Data Staff Tata Usaha</a></li> --}}
      <li class="breadcrumb-item active" aria-current="page">Home</li>
      <li class="breadcrumb-item">Restore Data Surat</li>

    </ol>
  </nav>
{{-- 
 <div class="butt d-flex">
    <form action="" method="get" class="col-md-3">
        <div class="input-group mb-3 ">
          <input type="text" class="form-control" placeholder="Username" name="keyword" aria-label="Username" aria-describedby="basic-addon1">
          <button type="submit" class="btn btn-outline-secondary">Cari</button>
        </div>
      </form>
      <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Sort By
      </a>
    
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">DESC</a></li>
        <li><a class="dropdown-item" href="#">ASc</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
    <div class="inti">
    <a href="{{ route('surat.create') }}" class="btn btn-primary mb-2">Tambah</a>
    <a href="{{ route('surat.excel') }}" class="btn btn-info mb-2">Export Data Surat</a>
    <a href="{{ route('surat.restore-data') }}" class="btn btn-warning mb-2">Restore Data</a>

    </div>
 </div> --}}



<table class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th>No</th>
        <th>Nomor Surat</th>
        <th>Perihal</th>
        <th>Tanggal Keluar</th>
        <th>Penerima Surat</th>
        <th>Notulis</th>
        {{-- <th>Hasil Rapat</th> --}}
        <th class="text-center">Aksi</th>
    </tr>
</thead>
<tbody>
    @php $no = 1 @endphp

    @foreach($dataRestore as $item)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $item['klasifikasi']['letter_code'] }}</td>
            <td>{{ $item['klasifikasi']['name_type'] }}</td>
            <td>
                @php
                setlocale(LC_ALL, 'IND');
                @endphp
                {{ Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}</>

            </td>
            </td>
            <td>
                @foreach ($item['recipients'] as $a)
                    {{ $loop->iteration }}.
                    {{ $a['name'] }}<br>
                @endforeach
            </td>
            <td>{{ $item['ntls']['name'] }}</td>
            {{-- <td>
                @if ($item['rslt'] !== null)
                    <p class="text-success">Sudah Dibuat</p>
                @else
                    <p class="text-danger">Belum Dibuat</p>
                @endif
            </td> --}}

            <td class="d-flex justify-content-center">
                <a href="{{ route('surat.restoreProses', $item['id']) }}" class="btn btn-primary me-1">Restore</a>
                <form action="{{ route('surat.delete-permanen', $item['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus ini dengan permanent?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
@endsection