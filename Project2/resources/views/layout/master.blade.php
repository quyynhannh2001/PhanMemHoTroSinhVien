<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQawuteIJ04xagnKTfCInPzuZ1A4oi7zLKCug&usqp=CAU" type="image/icon type">
  <title>@yield('title','Untitled')</title>
    <base href="{{asset('')}}assets/">
    @section('css')
        
   
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  

  @show
  
</head>
<style>
  /* .dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
} */

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: relative;
  background-color: #f1f1f1;
  min-width: 225px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-left: 5px;
  margin-bottom: 15px;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  /* font-size: 16px;
   */
   text-align: center;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}

</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake full-width-image" src="https://64.media.tumblr.com/c3ade0f1f2ab2acec276384a14c5c88c/tumblr_o0wvhfYnTX1v2gun3o1_250.gifv" alt="AdminLTELogo">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin/request/')}}" class="nav-link">Trang chủ</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block ">
        <a href="{{url('admin/contact')}}" class="nav-link">Liên hệ</a>
      </li> --}}
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/request/')}}" class="brand-link">
      <img src="https://www.bkacad.com/images/config/logo_1591255072.png" alt="AdminLTE Logo" class=" img-rounded img-thumbnail" style="opacity: 1" width="100%">
      {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mb-3 d-flex">
        {{-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        {{-- <div class="info"> 
          <a  href="{{url('admin/profile')}}" class="d-block">
            {{Auth::guard('admin')->user()->name}}
          </a>
        </div> --}}
        <div class="dropdown">
          <div class="info ml-5 ">
            <span style="font-size: 18px;">Xin chào, </span>
            <b style="font-size: 18px">{{Auth::guard('admin')->user()->name}}</b>
          </div>
          
          <div class="dropdown-content">
            <a href="{{route('admin.checklogout')}}">Đăng xuất</a>
          </div>
        </div>

      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Hỗ trợ sinh viên
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{url('admin/request/')}}"  class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Yêu cầu hỗ trợ</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/solved/')}}"  class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Đã giải quyết</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/notsolved')}}"  class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Chưa giải quyết</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    {{-- <form action="" style="width:150px">
                      <select name="searchSTT" id="" style="border: none">
                        <option  value="">  <i class="far fa-circle nav-icon"></i>trạng thai yêu cầu</option>
                        <option value="1">Đã giải quyết</option>
                        <option value="0">Chua giải quyết</option>
                      </select>
                    </form> --}}
                  </li>
                </ul>
              </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lý
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/department/')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Phòng/Ban</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/userr/')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hỗ trợ viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/student/')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sinh viên</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Thêm mới
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/department/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Phòng/Ban</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/userr/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hỗ trợ viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/student/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sinh viên</p>
                </a>
              </li>
            </ul>
          </li>
          <br><br><br>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        {{-- <div class="row">
          <div class="col-lg-12 col-12">
            Nội dung
          </div>
        </div> --}}
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-center">
    <strong>Copyright <i class="fa fa-heart"></i> 2021 quiin.engg</strong>
    {{-- All rights reserved. --}}
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div> --}}
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@section('scripts')
    

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="dist/js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

@show
</body>
</html>
