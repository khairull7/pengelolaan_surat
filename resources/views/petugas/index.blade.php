@extends('layouts.master')
@section('content')
     <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard {{ Auth::user()->username }}</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                  <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Petugas</h4>
                  </div>
                  <div class="card-body">
                     {{$petugas}}

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
                    <h4>Total Siswa</h4>
                  </div>
                  <div class="card-body">
                    {{$siswa}}
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
                    <h4>Tunggakan</h4>
                  </div>
                  <div class="card-body">
                    Rp {{ number_format($tunggakan, 0, ',', '.') }}

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file-alt"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Entri</h4>
                  </div>
                  <div class="card-body">
                    Rp {{ number_format($entri, 0, ',', '.') }}

                  </div>
                </div>
              </div>
            </div>
          </div>
         <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                 <div class="card-header">
                  <h4>Histori Pembayaran</h4>
                  <div class="card-header-action">
                    <a href="/petugas/histori" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-md">
                            <tr>
                                <th>Nisn</th>
                                <th>Nama</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal</th>
                            </tr>
                             @foreach($pembayaran as $data)
                             <tr>

                            <td>{{$data->nisn}}</td>
                            <td>{{$data->siswa->nama}}</td>
                            <td>Rp {{ number_format($data->jumlah_bayar, 0, ',', '.') }}</td>
                            <td>{{$data->tgl_bayar}}</td>
                      </tr>
                         @endforeach
                        </table>
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
                          <th>waktu</th>
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
          Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="https://nauval.in/">Mawitraa</a>
        </div>
        <div class="footer-right">

        </div>
      </footer>
@endsection
