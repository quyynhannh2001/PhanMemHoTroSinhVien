@extends('layout.master_student')

@section('title','Thông tin cá nhân')

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

{{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Thông tin cá nhân</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thông tin cá nhân</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section> --}}
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col -->
            <div class="col-md-12 mt-3">
              {{-- <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="dist/img/user2-160x160.jpg" alt="user image">
                          <span class="username">
                            <a href="#">Jonathan Burke Jr.</a>
                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                          </span>
                          <span class="description">Shared publicly - 7:30 PM today</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
  
                        <p>
                          <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                          <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                          <span class="float-right">
                            <a href="#" class="link-black text-sm">
                              <i class="far fa-comments mr-1"></i> Comments (5)
                            </a>
                          </span>
                        </p>
  
                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                      </div>
                      <!-- /.post -->
  
                      <!-- Post -->
                      <div class="post clearfix">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="dist/img/user2-160x160.jpg" alt="User Image">
                          <span class="username">
                            <a href="#">Sarah Ross</a>
                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                          </span>
                          <span class="description">Sent you a message - 3 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          Lorem ipsum represents a long-held tradition for designers,
                          typographers and the like. Some people hate it and argue for
                          its demise, but others ignore the hate as they create awesome
                          tools to help create filler text for everyone from bacon lovers
                          to Charlie Sheen fans.
                        </p>
  
                        <form class="form-horizontal">
                          <div class="input-group input-group-sm mb-0">
                            <input class="form-control form-control-sm" placeholder="Response">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-danger">Send</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.post -->
  
                      <!-- Post -->
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="dist/img/user2-160x160.jpg" alt="User Image">
                          <span class="username">
                            <a href="#">Adam Jones</a>
                            <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                          </span>
                          <span class="description">Posted 5 photos - 5 days ago</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="row mb-3">
                          <div class="col-sm-6">
                            <img class="img-fluid" src="dist/img/user2-160x160.jpg" alt="Photo">
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-6">
                            <div class="row">
                              <div class="col-sm-6">
                                <img class="img-fluid mb-3" src="dist/img/user2-160x160.jpg" alt="Photo">
                                <img class="img-fluid" src="dist/img/user2-160x160.jpg" alt="Photo">
                              </div>
                              <!-- /.col -->
                              <div class="col-sm-6">
                                <img class="img-fluid mb-3" src="dist/img/user2-160x160.jpg" alt="Photo">
                                <img class="img-fluid" src="dist/img/user2-160x160.jpg" alt="Photo">
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
  
                        <p>
                          <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                          <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                          <span class="float-right">
                            <a href="#" class="link-black text-sm">
                              <i class="far fa-comments mr-1"></i> Comments (5)
                            </a>
                          </span>
                        </p>
  
                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                      </div>
                      <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                      <!-- The timeline -->
                      <div class="timeline timeline-inverse">
                        <!-- timeline time label -->
                        <div class="time-label">
                          <span class="bg-danger">
                            10 Feb. 2014
                          </span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-envelope bg-primary"></i>
  
                          <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> 12:05</span>
  
                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
  
                            <div class="timeline-body">
                              Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                              weebly ning heekya handango imeem plugg dopplr jibjab, movity
                              jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                              quora plaxo ideeli hulu weebly balihoo...
                            </div>
                            <div class="timeline-footer">
                              <a href="#" class="btn btn-primary btn-sm">Read more</a>
                              <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-user bg-info"></i>
  
                          <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>
  
                            <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                            </h3>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-comments bg-warning"></i>
  
                          <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>
  
                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
  
                            <div class="timeline-body">
                              Take me to your leader!
                              Switzerland is small and neutral!
                              We are more like Germany, ambitious and misunderstood!
                            </div>
                            <div class="timeline-footer">
                              <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline time label -->
                        <div class="time-label">
                          <span class="bg-success">
                            3 Jan. 2014
                          </span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-camera bg-purple"></i>
  
                          <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> 2 days ago</span>
  
                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
  
                            <div class="timeline-body">
                              <img src="https://placehold.it/150x100" alt="...">
                              <img src="https://placehold.it/150x100" alt="...">
                              <img src="https://placehold.it/150x100" alt="...">
                              <img src="https://placehold.it/150x100" alt="...">
                            </div>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <div>
                          <i class="far fa-clock bg-gray"></i>
                        </div>
                      </div>
                    </div>
                    <!-- /.tab-pane -->
  
                    <div class="tab-pane" id="settings">
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName2" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div> --}}
              <div class="card card-primary card-outline">
                {{-- <div class="card-header">
                  <h3 class="card-title">Thêm Mới Sinh Viên</h3>
                </div> --}}
                <!-- /.card-header -->
                <!-- form start -->
                
                  <div class="card-body">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-rounded"
                           src="../{{Auth::guard('student')->user()->image}}"
                           alt="User profile picture">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="exampleInputName">Họ và tên</label>
                          <input type="text" class="form-control" placeholder="" value="{{Auth::guard('student')->user()->name}}" readonly>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Ngày sinh</label>

                                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                      <input type="date" readonly value="{{Auth::guard('student')->user()->dob}}" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                      
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
                                  <input type="text" readonly value="{{Auth::guard('student')->user()->phone}}" class="form-control"
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
                                <input type="text" value="{{Auth::guard('student')->user()->sex ==1?'Nữ':'Nam'}}" readonly class="form-control" >
                    
                              </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputDob">Địa chỉ</label>
                            <input type="text" readonly value="{{Auth::guard('student')->user()->address}}" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label for="exampleInputDob">Mã sinh viên</label>
                            <input type="text" readonly value="{{Auth::guard('student')->user()->id}}" class="form-control" placeholder="">
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Chuyên ngành</label>
                                  <input type="text" class="form-control" readonly 
                                  @if ( Auth::guard('student')->user()->subject==1)
                                      value="Lập Trình Máy Tính"
                                  @elseif(Auth::guard('student')->user()->subject==2)
                                       value="Quản Trị Kinh Doanh"
                                  @elseif(Auth::guard('student')->user()->subject==1)
                                       value="Quản Trị Mạng"
                                  @else
                                  value="Thiết Kế Đồ Họa"
                                  @endif
                                  >
                              </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <input type="text" class="form-control" readonly 
                                  @if ( Auth::guard('student')->user()->status==1)
                                      value="Đang học"
                                  @elseif(Auth::guard('student')->user()->status==2)
                                       value="Đã nghỉ học"
                                  @else
                                  value="Bảo lưu"
                                  @endif
                                  >
                              </div>
                        </div>
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" readonly value="{{Auth::guard('student')->user()->email}}" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                      <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4">
                      <form action="{{route('student.checklogout')}}">
                        <button class="btn btn-primary col-12">Đăng xuất</button>
                      </form>
                      </div>
                      {{-- <div class="col-3">
                        
                          <button class="btn btn-primary col-12">
                            Đổi mật khẩu
                            
                          </button>
                        
                        </div> --}}
                        <div class="col-4"></div>
                      </div>

                  </div>
                  <!-- /.card-body -->
              
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

@endsection
@endsection