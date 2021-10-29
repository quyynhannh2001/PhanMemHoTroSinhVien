@extends('layout.master_student')

@section('title','Chi tiết yêu cầu')

@section('content')
@section('css')
@parent
<!-- Google Font: Source Sans Pro -->
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- summernote -->
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<!-- CodeMirror -->
<link rel="stylesheet" href="plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
<!-- SimpleMDE -->
<link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection

<style>
  .inputBox textarea{
     width: 100%;
     padding: 5px 0;
     resize: none;
     font-size: 18px;
     font-weight: 400;
     color: #333;
     border: none;
     border-bottom: 1px solid lightgray;
   
     outline: none;
 }
 .inputBox textarea{
     min-height: 200px;
 }
</style>

<div class="card card-primary mt-3">
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
  <div class="card-header">
    <h3 class="card-title">Chi tiết yêu cầu</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form  method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- @method('PUT') --}}
    <div class="card-body">
      <div class="card-body p-0">
            
        <div class="mailbox-read-info pb-4">
            <div class="row">
                <div class="col-1">
                    <h5 style="font-weight: bold;">Chủ đề: </h5>
                </div>
                <div class="col-11">
                    {{-- <input type="text" name="req_title" value="{{$requestt->req_title}}" readonly class="form-control"> --}}
                    <span style="font-size: 22px" >{{$requestt->req_title}}</span>
                  </div>
        </div>
        <span class="mailbox-read-time float-left">From: {{Auth::guard('student')->user()->id}}</span>
            <span class="mailbox-read-time float-right">{{$requestt->created_at}}</span></h6>
        </div>
        
          <div class="mailbox-read-message">
            <div class="form-group">
                <h5 style="font-weight: bold;">Bộ phận tiếp nhận: </h5>
                <span>{{$requestt->deparment_name}}</span>
                {{-- <select class="form-control" name="dept_id">
                 
            
                    @forelse ($department as $item)
                        <option
                        @if ($item->id == $requestt->dept_id)
                        selected
                            
                        @endif
                        value="{{$item->id}}">{{$item->name}}</option>
                    @empty
                        
                    @endforelse
                  
              </select> --}}
              </div>
            
          </div>
        <div class="mailbox-read-message">
          
          <h5 style="font-weight: bold;">Nội dung: </h5>
        <div class="card-body">
          {{-- <textarea id="summernote" name="req_content" rows="100" > --}}
            <span>{{$requestt->req_content}}</span>
          {{-- </textarea> --}}
        </div>
        </div>
        <!-- /.mailbox-read-message -->
      </div>
      <!-- /.card-body -->
      <div class="card-footer bg-white">
      <h5 style="font-weight: bold">Tài liệu đính kèm:</h5>

      {{-- <div class="form-group">
      
          <label for="exampleFormControlFile1">Hình ảnh</label>
          <input type="file" name="image" class="form-control-file" accept="image/*" id="exampleFormControlFile1">
        
      </div> --}}
      @if ($requestt->image == NULL)
          Không có tệp đính kèm.
      @else
          <a href="../{{$requestt->image}}" target="_blank"><img src="../{{$requestt->image}}" alt="" width="250px"></a>
      @endif
        
        
      
      </div>
      <!-- /.card-footer -->
      {{-- <div class="card-footer">

        <button type="submit" class="btn btn-primary">Gửi</button>
       
      </div> --}}
    </div>
    <!-- /.card-body -->
    <div class="card card-primary mt-3">
      <div class="card-header">
        <h3 class="card-title">Trả lời</h3>
      </div>

    {{-- <div class="card-footer text-center">
      <button type="submit" class="btn btn-primary">Thêm</button>
    </div> --}}

    <div class="card-body">
     
      <div class="card-body p-0">
        
        <div class="mailbox-read-message">
          
          <h5 style="font-weight: bold;">Nội dung: </h5>
        <div class="card-body">
         
            {{-- <span>{{$requestt->req_content}}</span> --}}
           {{$requestt->reply}}
          </textarea>
        </div>
        </div>

        
        <!-- /.mailbox-read-message -->
      </div>

    </div>
    <!-- /.card-body -->

    
  </form>
</div>

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
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="plugins/codemirror/codemirror.js"></script>
<script src="plugins/codemirror/mode/css/css.js"></script>
<script src="plugins/codemirror/mode/xml/xml.js"></script>
<script src="plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
  // $(function () {
  //   // Summernote
  //   $('#summernote').summernote()
  //   // CodeMirror
  //   CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
  //     mode: "htmlmixed",
  //     theme: "monokai"
  //   });
  // })
  $('#summernote').summernote({
  height: 200,   //set editable area's height
  codemirror: { // codemirror options
    mode: "htmlmixed",
    theme: 'monokai'
  }
});
</script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>
@endsection
@endsection