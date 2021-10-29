@extends('layout.master_user')

@section('title','Danh sách yêu cầu')

{{-- @section('noti',$noti) --}}
{{-- @section('data',$data) --}}
    

{{-- @section('id',$id->id) --}}
{{-- {{$noti}} --}}
{{-- @endsection --}}
@section('content')
@section('css')
@parent 
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">   
@endsection
{{-- <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <a href="{{asset('student/add_req')}}"><button type="button" class="btn btn-primary btn-block"><i class="fa fa-plus-circle" style="font-size: 17px"></i> &ensp;Tạo yêu cầu</button></a>
    </div>
    <div class="col-4"></div>
</div> --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Thông báo: </strong>{{session('success')}}.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Thông báo: </strong>{{session('error')}}.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="card-body">
   
    <table id="example1" class="table table-bordered table-hover text-center">
      <thead>
        <tr>
          <th>Mã yêu cầu</th>
          <th>Tiêu đề</th>
          <th>Nội dung</th>
          
          <th>Ngày nhận</th>
          <th>Tình trạng</th>
          <th >Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @forelse ($requestt as $requestt)
          {{-- <input type="hidden" value="{{$requestt->created_at}}" name='start[{{$requestt->id}}]'> --}}
            <td>{{$requestt->id}}</td>
            <td>{{$requestt->req_title}}</td>
            <td>{{$requestt->req_content}}</td>
            <td>{{$requestt->created_at}}</td>
            @if ($requestt->reply == NULL)
                <td><button type="button" class="btn btn-warning">Chưa giải quyết</button></td>
            @else
                <td><button type="button" class="btn btn-success">Đã giải quyết</button></td>
            @endif
            <td>
              {{-- <a href="{{url('support/ruser/'.$requestt->id.'/edit')}}"> --}}
              <a href="{{route('ruser.edit',['ruser'=>$requestt->id])}}">
                <i class="fas fa-eye">&ensp;Đọc</i>
              </a>
            </td>
            {{-- <td>{{$requestt->note}}</td> --}}
            {{-- <td>
              <a href="{{url('department/'.$department->id.'/edit')}}">
                <button class="btn btn-outline-primary">Sửa</button>
              </a>
              <form action="{{url('department/'.$department->id)}}" method="POST">
                @method("DELETE")
                @csrf
                <button type="submit" class="btn btn-outline-danger">Xóa</button>
              </form>
            </td> --}}
           
        </tr>
              
          @empty
              <tr>
                <td colspan="7">Dữ liệu trống.</td>
              </tr>
          @endforelse
      </tbody>
      {{-- <tfoot>
        <tr>
          <th>Mã yêu cầu</th>
          <th>Tiêu đề</th>
          <th>Nội dung</th>
          
          <th>Tệp đính kèm</th>
          <th>Tình trạng</th>
          <th >Thao tác</th>
        </tr>
      </tfoot> --}}
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@section('scripts')
@parent
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  {{-- <script type="text/javascript">
    $(document).ready(function() {
      console.log(1);
      getNotify();
    });
    function getNotify() {
        var notificationsWrapper   = $('.dropdown-notifications');
        var notificationsCountElem = $('.notif-count');
        var notificationsCount     = parseInt(notificationsCountElem.data('count'));
        var notifications          = notificationsWrapper.find('div.dropdown-notify');
        var notiCountTitle = $('.drop-item-count');
        var dataReq = {!! json_encode($reqMoreThan3Days) !!};
        var objNotify = dataReq.content;
        notificationsCount = dataReq.count;
        console.log(objNotify.length);
        var newNotificationHtml = '';
        for(var i =0 ; i < objNotify.length; i++) {
            newNotificationHtml += `
              <span class="dropdown-item">
                <div><strong>Req's No: </strong>${objNotify[i].req_no}</div>
                <div><strong>Req's Title: </strong>` +  truncate(objNotify[i].req_title, 20) +`</div>
              </span>
              <div class="dropdown-divider"></div>
          `;
          
        }
        notifications.html(newNotificationHtml);
        notiCountTitle.text(notificationsCount+ ' messages');
        notificationsCountElem.text(notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
    }
    function truncate(str, n){
      return (str.length > n) ? str.substr(0, n-1) + '&hellip;' : str;
    };
  </script> --}}
@endsection
@endsection