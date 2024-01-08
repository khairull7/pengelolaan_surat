<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Pengelolaaan Surat</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('asset/dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
 <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('asset/dist/assets/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/assets/modules/codemirror/lib/codemirror.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/assets/modules/codemirror/theme/duotone-dark.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/assets/modules/jquery-selectric/selectric.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('asset/dist/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<style>
    td, th {
        white-space: nowrap;
    }
</style>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
         <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="
            {{asset('asset/dist/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->username }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a  href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Pengelolaan surat</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
        {{-- //ROUTER ADMIN --}}
         @if (auth()->user()->role == 'Staff')
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/staff"> Staff Dashboard</a></li>
              </ul>
            </li>
            <li class="menu-header">Data User</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-table"></i><span>Data User</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/staff/user"> User </a></li>
              </ul>
            </li>
            <li class="menu-header">Data Surat</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Surat</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/staff/klarifikasi">Data Klasifikasi Surat</a></li>
                <li><a class="nav-link" href="/staff/datasurat">Data Surat</a></li>
              </ul>
            </li>
        @endif

        {{-- //ROUTER PETUGAS --}}
        @if (auth()->user()->role == 'Guru')
           <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/guru"> Guru Dashboard</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="/admin/petugas/tunggakan"><i class="fas fa-money-check"></i> <span>Data Klasifikasi Surat </span></a></li>
      
        @endif

      
    </aside>
      </div>
    </div>
  </div>
  @yield('content')

  <!-- General JS Scripts -->
  <script src="{{asset('asset/dist/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/popper.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('asset/dist/assets/js/stisla.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('asset/dist/assets/js/scripts.js')}}"></script>
  <script src="{{asset('asset/dist/assets/js/custom.js')}}"></script>


  <!-- JS Libraies -->
  <script src="{{asset('asset/dist/assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/codemirror/lib/codemirror.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/codemirror/mode/javascript/javascript.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
    </script>
</body>
</html>
