@extends('layouts.main')
@section('title', 'bal')
@section('content')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    <h2 class="mb-3"> Edit Data Surat</h2>

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
            <li class="breadcrumb-item active" aria-current="page">Data Surat</li>
            <li class="breadcrumb-item">Edit Data Surat</li>

        </ol>
    </nav>

    <form action="{{ route('surat.update', $letter['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="main-content card p-3 mb-5">
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Perihal</label>
                <input type="text" class="form-control" name="letter_perihal" value="{{ $letter['letter_perihal'] }}">
            </div>


            <div class="mb-3">


                
                <label for="deskripsi" class="form-label">Klasifikasi</label>
                <select class="form-select" id="role" name="letter_type_id">
                    <option value="{{ $letter['klasifikasi']['id'] }}" hidden>{{ $letter['klasifikasi']['name_type'] }}</option>
                    @foreach ($letter2 as $item)
                    <option value="{{ $item['id']}}"> {{ $item['name_type']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input id="deskripsi" type="hidden" name="content" value="{!! $letter['content'] !!}">
                <trix-editor input="deskripsi"></trix-editor>
            </div>

            <div class="mb-3">
                <p>Peserta (<b>Ceklis jika "ya"</b>)</p>
                {{--- <input type="checkbox" name="recipients[]" value="{{ $letter['id'] }}" checked>
             --}}


                @foreach ($guru as $count => $person)
                    <label>
                        <input type="checkbox" name="recipients[]" value="{{ $person['id'] }}"
                            {{ isset($letter['recipients'][$count]['name']) ? 'checked' : '' }}>
                        {{ $person['name'] }}
                    </label><br>
                @endforeach
            </div>

            <div class="mb-3">
                <input type="hidden" name="file_upload_lama" value="{{ $letter['attachment'] }}">

                <label for="deskripsi" class="form-label">Lampiran</label>
                <input type="file" id="deskripsi"  name="file_upload" class="form-control">
             
            </div>
            <div class="mb-3">

                <label for="deskripsi" class="form-label">Notulis</label>
                <select class="form-select" id="role" name="notulis">
                    <option value="{{ $letter['ntls']['id'] }}" hidden>{{ $letter['ntls']['name'] }}</option>
                    @foreach ($guru as $item2)

                        <option value="{{ $item2['id'] }}"> {{ $item2['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Edit Data</button>

        </div>

    </form>
@endsection





