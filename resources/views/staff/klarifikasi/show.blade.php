@extends('layouts.master')

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
    {{-- @foreach ($letter_type['letter'] as $data)
      {{ $data[''] }}
  @endforeach 
  {{ $letter_type }} --}}
    <b>

        <h2 style="display: inline-block">{{ $klarifikasi['letter_code'] }}</h2> |  {{ $klarifikasi['name_type'] }}
    </b>
    <hr>

    @foreach ($klarifikasi['letter'] as $data)
        <div class="card mt-2 col-md-3">
            <div class="card-content" style="background: ">
                <div class="card-body">
                    <div class="media ">
                        <table>
                            <tr>
                                <td>
                                    <h5>{{ $data['letter_perihal'] }}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>
                                        @php
                                            setlocale(LC_ALL, 'IND');
                                        @endphp
                                        {{ Carbon\Carbon::parse($data['created_at'])->formatLocalized('%d %B %Y') }}
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ol>
                                        @foreach ($data['recipients'] as $b)
                                            
                                            <li>{{ $data['name'] }}<br></li>
                                        @endforeach
                                        
                                    </ol>
                                </td>
                                
                            </tr>
                            <tr>
                                <td> <a href="{{ route('klasifikasi.pdf', $data['id']) }}">Unduf pdf</a></td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    @endforeach

    <br>

@endsection
