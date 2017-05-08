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
   
    <script type="text/javascript" src="{!! asset('admin_asset/ck/ckeditor/ckeditor.js') !!}"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
                <script>
                    $(function(){
                        $('button').click(function(){
                            $('div').load('/pages.comment', function() {
                                alert('Thành phần đã được load.');
                            });
                        }); 
                    });
                    </script>
    <style>

.dropdown {
    position: relative;
    display: inline-block;
    
   
}

.dropdown-content {
    display: none;
  
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>
<body id="app-layout">
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       @include('pages.nav')
    </nav>
 <div class="container">
        <!-- slider -->
        <div class="row carousel-holder">
            <div class="col-md-12">
              @yield('slide')
            </div>
        </div>
        <!-- end slide -->

       
        <div class="row main-left">
            <div class="menu" >
                @yield('menu')
            </div>
            <div class="content">
            
              <div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="col-lg-9">

            <h1 align="center">{{$less->title}}</h1>
   
            <p>
                <video width="800px" height="300px" controls  >
                        
                        <source class="img-responsive"
                        src="{{asset('/uploads/lesson/video/'.$less->media)}}" type="video/mp4">
                </video>
            </p>
           
            <p><span class="glyphicon glyphicon-time"></span> 
                Posted on : {{$less->created_at}}
                <span style="float: right; margin-right: 30px">Lượt xem:{{$less->luotxem}}</span>
            </p>
            <hr>
            <!-- Post Content -->
            <p class="lead">{!! $less->noidung !!}</p>
            <a class="btn btn-primary" href="/test/{{$less->id}}">Test<span class="glyphicon glyphicon-chevron-right"></span></a>

            <hr>
            <!-- Comments Form -->
            
            <div class="well" id="formbox">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form role="form" action="" method="post" target="iframe">
                <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                    <div class="form-group">
                        <textarea class="form-control" name="noidung" rows="3"></textarea>
                    </div>
                    <button type="submit" va class="btn btn-primary">Gửi</button>


                </form>

            </div>

            <hr>        


           

        </div>

        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Liên Quan</b></div>
                <div class="panel-body">
                @foreach($lesslienquan as $lq)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="/cate/lesson/{{$lq->id}}">

                                <video width="80px" height="80px" class="img-responsive" poster="{{$lq->hinh}}">
                                    <source  src="{{$lq->media}}"  type="video/mp4">
                                </video>
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="/cate/lesson/{{$lq->id}}"><b>{{$lq->title}}</b></a>
                        </div>
                        <p style="padding-left: 5px">{{$lq->tomtat}}</p>
                        <div class="break"></div>
                    </div><hr>
                    <!-- end item -->
                @endforeach

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" align="center"><b>Nổi Bật</b></div>
                <div class="panel-body">
                @foreach($lessnoibat as $nb)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="/cate/lesson/{{$nb->id}}">

                                <video width="80px" height="80px" class="img-responsive" poster="{{$nb->hinh}}">
                                    <source  src="{{$nb->media}}"  type="video/mp4">
                                </video>
                           
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="/cate/lesson/{{$nb->id}}"><b>{{$nb->title}}</b></a>
                        </div>
                        <p style="padding-left: 5px">{{$nb->tomtat}}</p>
                        <div class="break"></div>
                    </div>
                    <hr>
                    <!-- end item -->
                @endforeach

                </div>
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</div>
            </div>
        </div>
    </div> 
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
