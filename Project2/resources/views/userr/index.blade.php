@extends('layout.master')

@section('title','Danh sách Hỗ Trợ Viên')

@section('content')
@section('css')
@parent 
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
@endsection
<div class="card-body">
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
    <table id="example1" class="table table-bordered table-hover text-center">
      <thead>
      <tr>
        <th>Mã HTV</th>
        <th>Họ và tên</th>
        <th>SĐT</th>
        <th>Phòng/Ban</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
      </thead>
      <tbody>
        @forelse ($userr as $userr)
        <tr>
          <td><a href="{{route('admin.userr.show',['userr'=>$userr->id])}}">{{$userr->id}}</a></td>
          <td>{{$userr->name}}</td>

          <td>{{$userr->phone}}</td>
          {{-- <td>{{$userr->email}}</td> --}}
          @if ($userr->dept_id == "P001")
              <td>Giáo vụ</td>
          @elseif($userr->dept_id == "P002")
              <td>Ký thuật</td>

          @else 
          <td>Giảng viên</td>
          @endif
         
          
            {{-- {{$student->status}} --}}
            @if ($userr->status==1)
              <td>Đang làm việc</td>
            @elseif ($userr->status==2)
              <td>Đã nghỉ việc</td>
            @else 
              <td>Đang tạm nghỉ</td>
            @endif
          
          <td>
            
            <form action="{{url('admin/userr/'.$userr->id)}}" method="POST">
              <a href="{{url('admin/userr/'.$userr->id.'/edit')}}">
                <i class="fas fa-eye">Sửa</i>
              </a>
              ||
              @method("DELETE")
              @csrf
              <button type="submit" style="border: none" onclick=" return ConfirmDelete()">
                <a href="" style="color: red"><i class="far fa-trash-alt">Xóa</i></a>
              </button>
            </form>
          </td>
          

        </tr>
            
        @empty
            <tr>
              <td colspan="6">Danh sách rỗng</td>
            </tr>
        @endforelse
      
      </tbody>
      
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
    function ConfirmDelete()
{
  var x = confirm("Bạn có chắc chắn muốn xóa không?");
  if (x)
      return true;
  else
    return false;
}
  </script>
@endsection
@endsection