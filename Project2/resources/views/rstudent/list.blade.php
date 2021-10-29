@extends('layout.master_student')

@section('title','Danh sách yêu cầu')

@section('content')
@section('css')
@parent 
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    
@endsection
<style>
  .max-lines {
  display: block;/* or inline-block */
  text-overflow: ellipsis;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 3.6em;
  line-height: 1.8em;
  max-width: 20em;
}
</style>
<div class="row">
    <div class="col-5"></div>
    <div class="col-2 mt-3">
        <a href="{{url('student/rstudent/create')}}"><button type="button" class="btn btn-primary btn-block"><i class="fa fa-plus-circle" style="font-size: 17px"></i> &ensp;Tạo yêu cầu</button></a>
    </div>
    <div class="col-4"></div>
</div>

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
        <th>Mã yêu cầu</th>
        <th>Tiêu đề</th>
        <th>Nội dung</th>
        
        <th>Thời gian</th>
        <th>Nội dung trả lời</th>
        <th >Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @forelse ($requestt as $requestt)
        
          <td>{{$requestt->id}}</td>
          <td>{{$requestt->req_title}}</td>
          <td><span class="max-lines">{{$requestt->req_content}}</span></td>
          <td>
            {{$requestt->created_at}}
            {{-- {{$requestt->image}} --}}
          {{-- <img src="{{$requestt->image}}" width="200px" alt=""> --}}
          </td>
          @if ($requestt->reply == NULL)
                <td><button type="button" class="btn btn-warning">Chờ trả lời</button></td>
            @else
                <td>{{$requestt->reply}}</td>
            @endif
          {{-- <td>{{$requestt->note}}</td> --}}
          {{-- <td>
            <form action="{{url('rstudent/'.$rquestt->id)}}" method="POST">
              @method("DELETE")
              @csrf
              <button type="submit" class="btn btn-outline-danger">Xóa</button>
            </form>
          </td> --}}
          <td>
              
              {{-- <a href="{{url('support/ruser/'.$requestt->id.'/edit')}}"> --}}
            
              <form action="{{route('student.rstudent.update',['rstudent'=>$requestt->id])}}" method="POST">
                <a href="{{route('student.rstudent.show',['rstudent'=>$requestt->id])}}">
                  {{-- <button class="btn btn-outline-primary"></button>
                   --}}
                   <i class="fas fa-eye">&ensp;Đọc</i>
                </a>
                ||
                @method('PUT')
                @csrf
                <input type="hidden" name="active" value="1">
                <button type="submit" onclick="return ConfirmDelete()" style="outline: none; border: none"><a href="" style="color: red"><i class="far fa-trash-alt">Xóa</i></a></button>
              </form>
              
              </a>
            
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
  </script>
  <script>
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