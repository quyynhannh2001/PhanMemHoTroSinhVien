@extends('layout.master')

@section('title','Danh sách sinh viên')

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
        <th class="col-1">MSV</th>
        <th class="col-3">Họ và tên</th>
        <th class="col-1.5 ">SĐT</th>
        <th class="col-3">Email</th>
        <th class="col-1.5">Trạng thái</th>
        <th class="col-2">Thao tác</th>
      </tr>
      </thead>
      <tbody>
        @forelse ($student as $student)
        <tr>
          <td><a href="{{route('admin.student.show',['student'=>$student->id])}}">{{$student->id}}</a></td>
          <td>{{$student->name}}</td>

          <td>{{$student->phone}}</td>
          <td>{{$student->email}}</td>
          {{-- <td>
            @if ($student->subject == 1)
              <span>Lập trình máy tính</span>
                
            @elseif ($student->subject == 2)
              <span>Quản trị kinh doanh</span>

             @elseif ($student->subject == 3)
              <span>Quản trị mạng</span>

            @else
            <span>Thiết kế đồ họa</span>
                
            @endif
          </td> --}}
          <td>
            {{-- {{$student->status}} --}}
            @if ($student->status==1)
              <span>Đang học</span>
            @elseif ($student->status==2)
              <span>Nghỉ học</span>
            @else 
              <span>Bảo lưu</span>
            @endif
          </td>
          <td>
           
            <form action="{{url('admin/student/'.$student->id)}}" method="POST">
              <a href="{{url('admin/student/'.$student->id.'/edit')}}">
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
              <td colspan="7">Danh sách rỗng</td>
            </tr>
        @endforelse
      
      </tbody>
      <tfoot>
        <tr>
          <th>Mã Sinh Viên</th>
          <th>Họ và tên</th>
          {{-- <th>Giới tính</th> --}}
          <th>SĐT</th>
          <th>Email</th>
          {{-- <th>Chuyên ngành</th> --}}
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </tfoot>
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
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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