{{-- {{ $letter_type }} --}}
@extends('layouts.main')
@section('title', '| Create Staff')

@section('content')
<h2 class="mb-3"> Detail Klasifikasi Surat</h2>

<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb">
      {{-- <li class="breadcrumb-item"><a href="#">Data Staff Tata Usaha</a></li> --}}
      <li class="breadcrumb-item active" aria-current="page">Home</li>
      <li class="breadcrumb-item active" aria-current="page">Data Klasifikasi Surat</li>
      <li class="breadcrumb-item">Detail Klasifikasi Surat</li>

    </ol>
  </nav>
  <b><h2>{{ $letter_type['letter_code'] }}</h2></b> 
  <hr>
  @php
  setlocale(LC_ALL, 'IND');
  @endphp
  {{ Carbon\Carbon::parse($letter_type['created_at'])->formatLocalized('%d %B %Y') }}<br><br>
  @foreach ($letter_type['letter'] as $a)
    @foreach ($a['recipients'] as $b )
    {{ $loop->iteration }}. 
      {{ $b['name'] }}<br>
    @endforeach
  @endforeach

  <br>

  <a href="{{ route('klasifikasi.pdf', $letter_type['id'])}}">Unduf pdf</a>
@endsection