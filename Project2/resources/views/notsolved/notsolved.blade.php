@extends('layout.master')

@section('title','Chưa giải quyết')

@section('content')

@section('css')
@parent 
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
@endsection
<div class="card-body">
 
  {{-- <form action="{{route('admin.request.index')}}" style="width:300px;margin-left: 370px;">
    <select class="custom-select" name="searchBan" id="searchBan" onchange="this.form.submit()">
      <option value="">Phòng/Ban</option>
      @forelse ($dep as $item)
          <option
          @if ($item->id==$searchBan)
              selected
          @endif
          value="{{$item->id}}">{{$item->name}}</option>
      @empty
      @endforelse
    </select>
  </form> --}}

    <table id="example1" class="table table-bordered table-hover text-center">
      <thead>
        <tr>
          <th>Mã yêu cầu</th>
          <th>Tiêu đề</th>
          {{-- <th>Nội dung</th> --}}
          <th>Người gửi</th>
          <th>Phòng/Ban tiếp nhận</th>
          <th>Người giải quyết</th>
          <th>Trạng thái</th>
          <th >Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          @forelse ($requestt as $request)
          
            <td>{{$request->id}}</td>
            <td>{{$request->req_title}}</td>
            {{-- <td>{{$request->req_content}}</td> --}}
            <td>{{$request->student_id}}</td>
            <td>{{$request->dept_id}}</td>
            <td>{{$request->user_id}}</td>
            @if ($request->reply==NULL)
                <td><button class="btn btn-warning">Chưa giải quyết</button></td>
            @else
                <td><button class="btn btn-success">Đã giải quyết</button></td>
            @endif
            <td>
              
              <form action="{{url('admin/request/'.$request->id)}}" method="POST">
                <a href="{{url('admin/request/'.$request->id.'/edit')}}">
                  <i class="fas fa-eye">Đọc</i>
                </a>
                ||
                @method("DELETE")
                @csrf
                {{-- <button type="submit" style="border: none; color: red" onclick="return ConfirmDelete()"><i class="fas fa-trash-alt">Xóa</i></button> --}}
                
                <button type="submit" style="border: none" onclick=" return ConfirmDelete()">
                  <a href=""  style="color: red"><i class="far fa-trash-alt">Xóa</i></a>
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
      {{-- <tfoot>
        <th>Mã yêu cầu</th>
          <th>Tiêu đề yêu cầu</th>
          <th>Nội dung yêu cầu</th>
          <th>Người gửi yêu cầu</th>
          <th>Phòng/Ban tiếp nhận</th>
          <th>Trạng thái</th>
          <th >Thao tác</th>
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
    
