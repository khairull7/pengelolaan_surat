@extends('layouts.master')
@section('content')
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="{{route('datasurat.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Data Surat</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Data Surat</a></div>
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
             <form action="{{ route('datasurat.store') }}" method="POST" enctype="multipart/form-data">
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Perihal</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" name="letter_perihal" class="form-control">
                      </div>
                    </div>
                     <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Klasifikasi Surat</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric"  name="lettertype_id" required>
                         @foreach($klarifikasi as $data)
                            <option {{ $data->id == old('lettertype_id') ? 'selected' : '' }} value="{{ $data->id }}">{{$data->name_type}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi Surat</label>
                      <div class="col-sm-12 col-md-7">
                          <textarea name="content" class="summernote"></textarea>
                      </div>
                  </div>
                  

                    <div class="form-group row mb-4">
                      <p>Peserta (<b>Ceklis jika "ya"</b>)</p>
                      @foreach ($user as $users)
                          <label>
                              <input type="checkbox" name="recipients[]" value="{{ $users['id'] }}">
                              {{ $users['name'] }}
                          </label><br>
                      @endforeach
                  </div>
                  
                  
                  <div class="form-group row mb-4">
                    <label for="deskripsi" class="form-label">Lampiran</label>
                      <input type="file" id="deskripsi"  name="file_upload" class="form-control">
                   
                  </div>
              
                  <div class="form-group row mb-4">              
                      <label for="deskripsi" class="form-label">Notulis</label>
                      <select class="form-select" id="role" name="notulis">
                          <option value="" hidden>pilih</option>
                          @foreach ($user as $item2)
                          <option value="{{ $item2['id']}}"> {{ $item2['name']}}</option>
                          @endforeach
                      </select>
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