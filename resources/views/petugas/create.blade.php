@extends('layouts.master')
@section('content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{route('entri.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Data Pembayaran</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Pembayaran</a></div>
              <div class="breadcrumb-item">Tambah</div>
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
             <form action="{{ route('entri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tambah Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Petugas</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="user_id" required >
                        <option>{{ Auth::user()->username}}</option>
                        </select>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nisn</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control" name="nisn" id="nisn" value="{{ old('nisn') }}" required>
                        @foreach($siswa as $data)
                        <option value="{{$data->nisn}}" title="{{$data->nama}}">{{$data->nisn}}</option>
                        @endforeach
                        </select>

                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="tunggakan" required>
                         @foreach($tunggakan as $data)
                            <option {{ $data->id == old('tunggakan') ? 'selected' : '' }} value="{{ $data->id }}"> {{$data->siswa->nama}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    {{-- <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="tunggakan_id" required>
                         @foreach($tunggakan as $data)
                            <option {{ $data->id == old('tunggakan_id') ? 'selected' : '' }} value="{{ $data->id }}">{{ $data->bulan }} Bulan </option>
                            @endforeach
                        </select>
                      </div>
                    </div> --}}
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SPP</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="siswa_id" required  id="bil1">
                         @foreach($siswa as $data)
                            <option {{ $data->id == old('siswa_id') ? 'selected' : '' }} value="{{ $data->id }}" data-nominal="{{ $data->spp->nominal }}">Rp {{ number_format($data->spp->nominal, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bulan Dibayar</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="bulan_dibayar" class="form-control" id="bil2">
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Bayar</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" name="jumlah_bayar" class="form-control" id="hasil">
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
     <script>
        document.querySelector('#bil2').addEventListener('input', () => {
            const bil1 = parseInt(document.querySelector('#bil1')[document.querySelector('#bil1').selectedIndex].dataset.nominal)
            const bil2 = parseInt(document.querySelector('#bil2').value)
            const hasil = bil1 * bil2
            document.querySelector('#hasil').value = hasil
        })
      </script>
@endsection
