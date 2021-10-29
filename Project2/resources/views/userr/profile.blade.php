@extends('layout.master_user')

@section('title','Thông tin cá nhân')

{{-- @section('noti',$noti) --}}

@section('content')
@section('css')
@parent
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
@endsection
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
           
            <!-- /.col -->
            <div class="col-md-12">
             
              <div class="card card-primary card-outline">
                {{-- <div class="card-header">
                  <h3 class="card-title">Thêm Mới Sinh Viên</h3>
                </div> --}}
                <!-- /.card-header -->
                <!-- form start -->
                
                  <div class="card-body">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-rounded"
                           src="../{{Auth::guard('support')->user()->image}}"
                           alt="User profile picture">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="exampleInputName">Họ và tên</label>
                          <input type="text" readonly value="{{Auth::guard('support')->user()->name}}" class="form-control" placeholder="">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Ngày sinh</label>

                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                      <input type="text" readonly value="{{Auth::guard('support')->user()->dob}}" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                      
                                  </div>
                              </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Số điện thoại</label>
              
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                  </div>
                                  <input type="text" readonly value="{{Auth::guard('support')->user()->phone}}" class="form-control"
                                         data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask>
                                </div>
                                <!-- /.input group -->
                              </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Giới tính</label>
                                <input type="text" readonly class="form-control"
                                @if (Auth::guard('support')->user()->sex == 1)
                                    value="Nữ"
                                @else
                                    value="Nam"
                                @endif
                                >
                              </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputDob">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="" readonly value="{{Auth::guard('support')->user()->address}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="exampleInputDob">Mã sinh viên</label>
                            <input type="text" readonly value="{{Auth::guard('support')->user()->id}}" class="form-control" placeholder="">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Phòng/Ban</label>

                                <input type="text" readonly class="form-control" 
                                  @if (Auth::guard('support')->user()->dep_id=="P001")
                                      value="Giáo vụ"
                                  @elseif(Auth::guard('support')->user()->dep_id=="P002")
                                      value="Kỹ thuật"
                                  @else value = "Giảng viên"
                                  @endif
                                >
                              </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <input type="text" readonly class="form-control"
                              @if (Auth::guard('support')->user()->status==1)
                                  value="Đang làm việc"
                              @elseif(Auth::guard('support')->user()->status==2)
                                  value="Đã nghỉ việc"
                               @else value="Đang tạm nghỉ"
                              @endif
                              >
                              </div>
                              
                        </div>
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" readonly value="{{Auth::guard('support')->user()->email}}" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                     
                  </div>
                  <!-- /.card-body -->
                  <div class="row">
                    <div class="col-4"></div>
                    <div class="col-4">
                  <form action="{{route('support.checklogout')}}">
                    <button class="btn btn-primary btn-block">Đăng xuất</button></form>
                  </div>
                    <div class="col-4"></div>
                  </div>
\
                
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    <!-- /.content -->
@section('scripts')
@parent
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="dist/js/demo.js"></script> --}}
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
@endsection
@endsection