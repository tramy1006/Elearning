<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Learning</title>

    <!-- Fonts -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <script src="/js/bootstrap.js"></script>
    
    <script type="text/javascript" src="{!! asset('admin_asset/ck/ckeditor/ckeditor.js') !!}"></script>
   
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        @include('pages.nav')
    </nav>
 <div class="container">
        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-12">
              @include('pages.slide')
            </div>
        </div>
        <!-- end slide -->

       
        <div class="row main-left">
            <div class="col-md-12" >
             
			     <div class="panel panel-default">
    				<div class="row">
    				  	<h2 align="center" style="margin-bottom: 50px; margin-top: 20px">WEBCOME TO WEBSITE</h2>
    				  	<div class="col-md-3" style="margin-right: 60px; height: 250px; margin-left: 70px">
    				  		<img src="/thongminh.jpg" width="100%" height="100px" >
    				  		<b>Hệ thống bài học thông minh, đa dạng & liên tục được cập nhật</b>
    				  	</div>
    				  	<div class="col-md-3" style=" margin-right: 60px; height: 250px ">
    				  		<img src="/doituong.jpg" width="100%" height="100px" >
    				  		<b>Chương trình phù hợp với mọi đối tượng</b>
    				  	</div>
    				  	<div class="col-md-3" style="height: 250px">
    				  	<img src="/thoigian.jpg" width="100%" height="100px">
    				  		<b>Chủ động về thời gian, địa điểm</b>
    				  	</div>
    				  	<div class="col-md-3" style="margin-right: 60px; height: 250px; margin-left: 70px">
    				  		<img src="/ontap.jpg" width="100%" height="100px" >
    				  		<b>Ôn tập và học lại kiến thức theo trình độ của mình</b>
    				  	</div>
    				  		<div class="col-md-3" style="margin-right: 60px; height: 250px; ">
    				  		<img src="/nguoidung.png" width="100%" height="100px" >
    				  		<b>Gửi bài để nhận điểm và kết quả trực tiếp từ hệ thống</b>
    				  	</div>
    				  		<div class="col-md-3" style=" height: 250px;">
    				  		<img src="/tailieu.jpg" width="100%" height="100px" >
    				  		<b>Tài liệu tiếng Anh phong phú, thực tế</b>
    				  	</div>
    			  	</div>

			  	
			    </div>
		    </div>
        </div>
       
    </div> 
    <footer style="height: 60px;background-color: #000; margin-top: -20px;color: #fff;">
    
    </footer>
   
       
   
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>


</body>
</html>
