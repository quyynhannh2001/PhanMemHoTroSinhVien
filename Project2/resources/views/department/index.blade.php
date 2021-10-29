@extends('layout.master')

@section('title','Danh Sách Phòng/Ban')

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
          <th>Mã số</th>
          <th>Tên Phòng/Ban</th>
          <th>Email Phòng/Ban</th>
          <th>SĐT Phòng/Ban</th>
          <th>Ghi chú</th>
          <th >Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @forelse ($department as $department)
          
            <td>{{$department->id}}</td>
            <td>{{$department->name}}</td>
            <td>{{$department->email}}</td>
            <td>{{$department->phone}}</td>
            {{-- <td>
              {{$department->note}}
            </td> --}}
            @if ($department->note == "")
                <td>Không có</td>
            @else
                <td>{{$department->note}}</td>
            @endif
            <td>
              
              <form action="{{url('admin/department/'.$department->id)}}" method="POST">
                <a href="{{url('admin/department/'.$department->id.'/edit')}}">
                  <i class="fas fa-eye">Sửa</i>
                </a>
                ||
                @method("DELETE")
                @csrf
                <button type="submit"  style="border: none" onclick=" return ConfirmDelete()">
                  <a href="" style="color: red"><i class="far fa-trash-alt">Xóa</i></a>
                </button>
              </form>
            </td>
           
        </tr>
              
          @empty
              <tr>
                <td colspan="7">Dữ liệu trống.</td>
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
    
