@extends('layout.master')

@section('title','Chi Tiết Sinh viên')
    
@section('content')

@section('css')
@parent
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- daterange picker -->
<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- Select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- summernote -->
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<!-- CodeMirror -->
<link rel="stylesheet" href="plugins/codemirror/codemirror.css">
<link rel="stylesheet" href="plugins/codemirror/theme/monokai.css">
<!-- SimpleMDE -->
<link rel="stylesheet" href="plugins/simplemde/simplemde.min.css">
@endsection

<div class="card card-primary mt-3">
  <div class="card-header">
    <h3 class="card-title">Chi Tiết Sinh Viên</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
      <div class="form-group">
        {{-- <label for="exampleFormControlFile1">Hình ảnh</label> --}}
             {{-- <img src="value='{{$userr->image}}'" width="200px">
              --}}
              <a href="../{{$student->image}}" target="_blank"><img src="../{{$student->image}}" class="img-thumbnail rounded mx-auto d-block" style="cursor: zoom-in;" width="150px"/></a>
            
      </div>
      <div class="row">
          <div class="col-4">
            <label for="exampleInputName">Họ và tên</label>
            <input type="text" name="name" class="form-control" value="{{$student->name}}" readonly placeholder="">
          </div>
          <div class="col-4">
            <div class="form-group">
              <label>Ngày sinh</label>

                {{-- <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div> --}}
                    <input type="date" name="dob" readonly value="{{$student->dob}}" class="form-control">
                    
                
            {{-- </div> --}}
           </div>
          </div>
      <div class="col-4">
          <div class="form-group">
              <label>Số điện thoại</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="text" readonly name="phone" value="{{$student->phone}}" class="form-control"
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
              <select class="form-control" name="sex" readonly>
                {{-- @if ($student->sex)
                <option value="{{$student->sex}}" selected></option>
          
                @else --}}
                <option value="1" {{ $student->sex == 1 ? 'selected' : '' }}>Nữ</option>
                <option value="2" {{ $student->sex == 2 ? 'selected' : '' }}>Nam</option>
                <option value="3" {{ $student->sex == 3 ? 'selected' : '' }}>Khác</option>
                {{-- @endif --}}
              </select>
              
            </div>
      </div>
      <div class="col-6">
          <label for="exampleInputDob">Địa chỉ</label>
          <input type="text" readonly name="address" value="{{$student->address}}" class="form-control" placeholder="">
      </div>
  </div>
  <div class="row">
      <div class="col-4">
          <label for="exampleInputDob">Mã SV</label>
          <input type="text" name="id" readonly class="form-control" value="{{$student->id}}" placeholder="">
      </div>
      <div class="col-4">
        <div class="form-group">
            <label>Chuyên ngành</label>
            <select class="form-control" name="subject" readonly>
              <option value="1" {{ $student->subject == 1 ? 'selected' : '' }}>Lập trình máy tính</option>
              <option value="2" {{ $student->subject == 2 ? 'selected' : '' }}>Quản trị kinh doanh</option>
              <option value="3" {{ $student->subject == 3 ? 'selected' : '' }}>Quản trị mạng</option>
              <option value="4" {{ $student->subject == 4 ? 'selected' : '' }}>Thiết kế đồ họa</option>
            </select>
          </div>
    </div>
      <div class="col-4">
          <div class="form-group">
              <label>Trạng thái</label>
              <select class="form-control" name="status" readonly value="{{$student->status}}">
                <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>Đang làm việc</option>
                <option value="2" {{ $student->status == 2 ? 'selected' : '' }}>Đã nghỉ việc</option>
                <option value="3" {{ $student->status == 3 ? 'selected' : '' }}>Đang tạm nghỉ</option>
              </select>
            </div>
      </div> 
  </div>
  <div class="form-group">
      <label for="exampleFormControlInput1">Email</label>
      <input type="email" name="email" value="{{$student->email}}" readonly class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    {{-- <div class="row">
          <div class="col-6">
              <div class="form-group">
              <label for="exampleInputPassword1">Mật khẩu</label>
              <input type="password" name="password" value="{{$userr->password}}" class="form-control" id="exampleInputPassword1" placeholder="">
              </div>
          </div>
          <div class="col-6">
              <div class="form-group">
              <label for="exampleInputPassword1">Nhập lại mật khẩu</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
              </div>
          </div>
      </div> --}}
  <div class="mailbox-read-message">

      <label for="exampleInputPassword1">Ghi chú</label>
    <div class="card-body">
      <textarea readonly name="note" id="summernote" rows="100">
            <span>{{$student->note}}</span>
  
      </textarea>
    </div>
    </div>
  {{-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> --}}
  </div>
    <!-- /.card-body -->

   
  </form>
   <div class="card-footer text-center">
      
        <a href="{{url('admin/student/'.$student->id.'/edit')}}">
            <button class="btn btn-primary">Đi đến sửa</button>
          </a>
        
    </div>
</div>
@section('scripts')
@parent
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
<!-- Page specific script -->
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

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

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
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
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
    
@endsection
         
@endsection