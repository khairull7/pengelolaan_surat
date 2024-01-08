@extends('layouts.master    ')
@section('content')
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard {{ Auth::user()->name }}</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Staff User</h4>
                  </div>
                  <div class="card-body">
                     {{$user}}

                  </div>
                </div>
              </div>
            </div>
 <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Guru User</h4>
                  </div>
                  <div class="card-body">
                     {{$guru}}

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Klasifikasi Surat</h4>
                  </div>
                  <div class="card-body">
                    {{$klarifikasi}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-money-check"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Surat Keluar</h4>
                  </div>
                  <div class="card-body">
                    {{-- Rp {{ number_format($tunggakan, 0, ',', '.') }} --}}

                  </div>
                </div>
              </div>
            </div>


              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Notifikasi</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tr>
                          <th>User</th>
                          <th>Aktivitas</th>
                          <th>Waktu</th>
                        </tr>
                            @foreach($notif as $data)
                        <tr>
                            <td>{{$data->user}}</td>
                            <td>{{$data->aktivitas}}</td>
                            <td>{{$data->waktu}}</td>
                        </tr>
                            @endforeach
                      </table>
                </div>
                  </div>
                </div>
              </div>
            </div>

        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://khrl/">Khairul</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
@endsection
