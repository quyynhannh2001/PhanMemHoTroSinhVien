<title>Trang Đăng Nhập Cho Support</title>
<link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQawuteIJ04xagnKTfCInPzuZ1A4oi7zLKCug&usqp=CAU" type="image/icon type">
<!--important link source from "https://bootsnipp.com/snippets/GlaW2"-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Đăng nhập</h2>
		    <form class="login-form" method="POST" action="{{route('support.checklogin')}}">
          @csrf
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Mã Hỗ Trợ Viên</label>
    <input type="text" name="msp" value="{{old('msp')}}" class="form-control" placeholder="">
    <span class="alert text-danger font-weight-bolder font-italic">{{ $errors->first('msp') }}</span>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu</label>
    <input type="password" name="password" class="form-control" placeholder="">
    <span class="alert text-danger font-weight-bolder font-italic">{{ $errors->first('password') }}</span>
  </div>
  
  <br>
    <div class="form-check text-center" style="padding-left: 10px;">
   
    <button type="submit" class="btn btn-outline-primary ">Đăng nhập</button>
  </div>
  
</form>
@if (Session::get('fail'))
          <div class="alert alert-primary">
            {{Session::get('fail')}}
          </div>
        @endif
<div class="copy-text">Copyright <i class="fa fa-heart"></i> 2021 <a href="https://www.facebook.com/quyynhannhxiinhlaam/">quiin.engg</a></div>
		</div>
		<div class="col-md-8" id="slideshow">
      <a href="https://www.bkacad.com/">
        <div class="slide-wrapper">
         <div class="slide"><img src="https://scontent.fhan14-2.fna.fbcdn.net/v/t1.15752-9/248061315_1041617803079295_177818203714086855_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=ae9488&_nc_ohc=cIR8jb7uiDwAX9TVBAy&_nc_ht=scontent.fhan14-2.fna&oh=d0b4858c5c7c604c8a39a4e0cea23c99&oe=61A309E5"></div>
          <div class="slide"><img src="https://scontent.fhan14-1.fna.fbcdn.net/v/t1.15752-9/250008452_881223392579711_3291334977839721241_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=ae9488&_nc_ohc=8FWr5ZGHjTIAX8HaECk&_nc_ht=scontent.fhan14-1.fna&oh=4bafea92827f6adbc703159e3deb2a38&oe=61A34C8D"></div>
          <div class="slide"><img src="https://scontent.fhan14-1.fna.fbcdn.net/v/t1.15752-9/247713731_296462675465488_4035887486510111430_n.jpg?_nc_cat=101&ccb=1-5&_nc_sid=ae9488&_nc_ohc=-s8e7WiOEIUAX9g-1eB&_nc_ht=scontent.fhan14-1.fna&oh=4482b58ecd5aad5c124647cbcb665891&oe=61A13E4D"></div>          
          
        </div>
      </a>
      
	</div>
</div>
</section>

<style>
  @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
background: #99CCFF; 
background: -webkit-linear-gradient(to bottom, #99CCFF, #007BFF);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #99CCFF, #007BFF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;
padding : 75px 0;
}
/* .banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;} */
/* .banner-sec1{background:url(https://znews-photo.zadn.vn/w660/Uploaded/zbvunua/2021_04_13/158503453_1951803141624366_6833028124524264881_n_1.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; min-width: 480px; border-radius: 0 10px 10px 0; padding:0;} */
.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#99CCFF;}
.login-sec .copy-text a{color:#007BFF;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #007BFF;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#99CCFF; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #007BFF; color:#fff; font-weight:600;}
/* .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;} */

.col-md-8{
  background-color: #0f5a93;
  /* padding-right: 15px; */
  border-radius: 0 10px 10px 0;
}

#slideshow {
   overflow: hidden;
   height: 510px;
   width: 728px;
   margin: 0 auto;
   padding-left: 18px;
 }
.slide-wrapper {
   width: 2912px;
   -webkit-animation: slide 14s ease infinite;
 }
.slide {
   float: left;
   height: 510px;
   width: 728px;
 }
 img{
   height: 510px;
   width: 100%;
   /* border-radius: 0 10px 10px 0; */
   /* margin-left: 20px; */
   /* margin-right: -20px; */
 }
@-webkit-keyframes slide {
   20% {margin-left: 0px;}
   30% {margin-left: -728px;}
   50% {margin-left: -728px;}
   60% {margin-left: -1456px;}
   80% {margin-left: -1456px;}
 }
 .form-control{
   border: 3px solid;
			border-right-color: #007BFF;
      border-top-color: #007BFF;
      border-bottom-color: #99CCFF;
      border-left-color: #99CCFF;
			border-radius: 20px;
 }
</style>