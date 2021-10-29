
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
  .dropdown-menu {
    position: absolute;
    top: 50%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    /* min-width: 10rem; */
    /* padding: .5rem 0; */
    margin: .125rem 2rem 0;
    font-size: 1rem;
    color: #212529;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: .25rem;
    box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 18%);
  }
  .dropdown-footer, .dropdown-header {
    display: block;
    font-size: .875rem;
    /* padding: .5rem 1rem; */
    text-align: center;
    font-weight: bold;
    font-size: 16px;
    color: red;
}
.navbar-badge {
    font-size: .7rem;
    font-weight: 300;
    padding: 2px 4px;
    position: absolute;
    right: 6px;
    top: 4px;
}
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
      <a href="{{route('support.ruser.index')}}" class="navbar-brand">
        <img src="https://www.bkacad.com/images/config/logo_1591255072.png" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Học Viện Công Nghệ BKACAD</b></span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      {{-- <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          
          <li class="nav-item">
            <a href="{{url('userr/contact')}}" class="nav-link">Liên hệ</a>
          </li>
        
        </ul>


      </div> --}}

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto pt-3">

        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-danger navbar-badge">{{$count}}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <b class="dropdown-header" style="color:red">Cảnh báo: {{$count}} yêu cầu quá hạn 3 ngày</b>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
 
          </div>
        </li> --}}

        <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown pb-3">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i data-count="0" class="far fa-bell" style="font-size: 20px; padding-top: 6px"></i>
          <span class="badge badge-danger navbar-badge notif-count"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-notifications">
          <span class="dropdown-item dropdown-header drop-item-count"> Notifications</span>
          <div class="dropdown-divider"></div>
          <div class="dropdown-notify">
            <!-- Notifications -->
          </div>
          {{-- <div class="dropdown-divider"></div> --}}
          {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
        </div>
      </li>
      <!--------->
        <li class="nav-item dropdown">
          <div class="user-panel">
            {{-- <div class="image">
              <img src="../{{Auth::guard('support')->user()->image}}" class="img-rounded elevation-2 mb-3" alt="User Image">
            </div> --}}
            <div class="info">
              {{-- <a href="{{url('support/profile')}}" class="d-block">{{Auth::guard('support')->user()->name}}</a> --}}
              <li class="nav-item dropdown">
                <a style="font-size: 18px; font-weight: bold" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Xin chào,  {{Auth::guard('support')->user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 300px;">
                  {{-- <a class="dropdown-item" href="#">FAQ</a> --}}
                  <div class="row">
                    <div class="col-5">
                      <a href="../{{Auth::guard('support')->user()->image}}" target="_blank"><img id="phongto" src="../{{Auth::guard('support')->user()->image}}" alt="" width="100%" class="img-rounded"></a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="col-7">
                      <span >ID: {{Auth::guard('support')->user()->id}} - @if (Auth::guard('support')->user()->dept_id=="P001")
                        <span>Giáo vụ</span>
                    @elseif(Auth::guard('support')->user()->dept_id=="P002")
                        <span>Kỹ thuật</span>
                    @else <span>Giảng viên</span>
                    @endif</span>
                      <div class="dropdown-divider"></div>
                      <span>Ngày sinh: {{Auth::guard('support')->user()->dob}}</span>
                      <div class="dropdown-divider"></div>
                      <span>SĐT: {{Auth::guard('support')->user()->phone}}</span>
                      <div class="dropdown-divider"></div>
                      <span>Địa chỉ: {{Auth::guard('support')->user()->address}}</span>
                      <div class="dropdown-divider"></div>
                      
                       
                    </div>
                    <div class="dropdown-divider"></div>
                  
                  <a class="dropdown-item text-center" href="{{route('support.checklogout')}}">Đăng xuất</a>
                  {{-- <div class="dropdown-divider"></div> --}}
                  {{-- <a class="dropdown-item" href="#">Contact</a> --}}
                </div>
                </div>
              </li>
              
              
            </div>
          </div>
    
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
              class="fas fa-th-large"></i></a>
        </li> --}}
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
 
        
        @yield('content')
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- To the right -->
    {{-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> --}}
    <!-- Default to the left -->
    <strong >Copyright <i class="fa fa-heart"></i> 2021 quiin.engg</strong>
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

<script type="text/javascript">
  $(document).ready(function() {
    //console.log("vao day");
    getNotify();
    
  });
  function getNotify() {
    console.log("vao day");
    var notificationsWrapper   = $('.dropdown-notifications');
      var notificationsCountElem = $('.notif-count');
      var notificationsCount     = parseInt(notificationsCountElem.data('count'));
      var notifications          = notificationsWrapper.find('div.dropdown-notify');
      var notiCountTitle = $('.drop-item-count');
      var dataReq = {!! json_encode($reqMoreThan3Days) !!};
      var objNotify = dataReq.content;
      notificationsCount = dataReq.count;
      var newNotificationHtml = '';
      for(var i in objNotify) {
          newNotificationHtml += `
            <span class="dropdown-item">
              <div><strong>Mã yêu cầu: </strong>${objNotify[i].id}</div>
              <div><strong>Nội dung: </strong>` +  truncate(objNotify[i].req_title, 20) +`</div>
            </span>
            <div class="dropdown-divider"></div>
        `;
        
      }
      notifications.html(newNotificationHtml);
      notiCountTitle.text('Có ' +notificationsCount+ ' yêu cầu đã quá hạn 3 ngày ');
      notificationsCountElem.text(notificationsCount);
      notificationsWrapper.find('.notif-count').text(notificationsCount);
  }
  function truncate(str, n){
    return (str.length > n) ? str.substr(0, n-1) + '&hellip;' : str;
  };
</script>

@show
</body>
</html>
