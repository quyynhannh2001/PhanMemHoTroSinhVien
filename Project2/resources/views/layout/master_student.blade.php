
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQawuteIJ04xagnKTfCInPzuZ1A4oi7zLKCug&usqp=CAU" type="image/icon type">
  <title>@yield('title','Untitled')</title>
  <base href="{{asset('')}}assets/">
  @section('css')

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @show
</head>
<style>
  #phongto {
transition: all 0.5s ease;
-webkit-transition: all 0.5s ease;
-moz-transition: all 0.5s ease;
-o-transition: all 0.5s ease;
}
 
#phongto:hover {
transform: scale(1.5,1.5);
-webkit-transform: scale(1.5,1.5);
-moz-transform: scale(1.5,1.5);
-o-transform: scale(1.5,1.5);
-ms-transform: scale(1.5,1.5);
margin-top: 7%;
position: absolute;
z-index: 10;
}
</style>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container" style="height: 40px;">
      <a href="{{route('student.rstudent.index')}}" class="navbar-brand">
        <img src="https://www.bkacad.com/images/config/logo_1591255072.png" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Học Viện Công Nghệ BKACAD</b></span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          {{-- <li class="nav-item">
            <a href="{{asset('rstudent')}}" class="nav-link">Trang chủ</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{url('student/contact')}}" class="nav-link">Liên hệ</a>
          </li> --}}

        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto pt-3">
       
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <div class="user-panel">
            <div class="image">
              <img src="../{{Auth::guard('student')->user()->image}}" class="img-rounded mb-3" alt="User Image">
              {{-- <span>{{Auth::guard('student')->user()->image}}</span> --}}
              {{-- <img src="../{{Auth::guard('student')->user()->image}}"> --}}
            </div>
            <div class="info">
              {{-- <a href="{{url('student/profile')}}" class="d-block">{{Auth::guard('student')->user()->name}}</a> --}}
              <li class="nav-item dropdown">
                <a style="font-size: 18px; font-weight: bold" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Xin chào,  {{Auth::guard('student')->user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 300px;">
                  {{-- <a class="dropdown-item" href="#">FAQ</a> --}}
                  <div class="row">
                    <div class="col-5">
                      <a href="../{{Auth::guard('student')->user()->image}}" target="_blank"><img id="phongto" src="../{{Auth::guard('student')->user()->image}}" alt="" width="100%" class="img-rounded"></a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="col-7">
                      <span >ID: {{Auth::guard('student')->user()->id}} - @if (Auth::guard('student')->user()->subject==1)
                        <span>LTMT</span>
                    @elseif(Auth::guard('student')->user()->subject==2)
                        <span>QTKD</span>
                        @elseif(Auth::guard('student')->user()->subject==3)
                        <span>QTM</span>
                    @else <span>TKDH</span>
                    @endif</span>
                      <div class="dropdown-divider"></div>
                      <span>Ngày sinh: {{Auth::guard('student')->user()->dob}}</span>
                      <div class="dropdown-divider"></div>
                      <span>SĐT: {{Auth::guard('student')->user()->phone}}</span>
                      <div class="dropdown-divider"></div>
                      <span>Địa chỉ: {{Auth::guard('student')->user()->address}}</span>
                      <div class="dropdown-divider"></div>
                      
                       
                    </div>
                    <div class="dropdown-divider"></div>
                  
                  <a class="dropdown-item text-center" href="{{route('student.checklogout')}}">Đăng xuất</a>
                  {{-- <div class="dropdown-divider"></div> --}}
                  {{-- <a class="dropdown-item" href="#">Contact</a> --}}
                </div>
                </div>
              </li>
            </div>
          </div>
    
        </li>

      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <div class="content " style="padding: 0">
      <div class="container">

        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <footer class="main-footer text-center">

    <strong>Copyright <i class="fa fa-heart"></i> 2021 quiin.engg</strong>
  </footer>
</div>
<!-- ./wrapper -->
@section('scripts')
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

@show
</body>
</html>
