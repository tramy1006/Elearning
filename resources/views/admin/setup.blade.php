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

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
   
    <script type="text/javascript" src="{!! asset('admin_asset/ck/ckeditor/ckeditor.js') !!}"></script>
 
</head>
<body id="app-layout">
 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       @include('pages.nav')
    </nav>
<div class="container">
    <div class="col-md-4" style="margin-right: 100px;margin-left: 30px;margin-top: 70px"> 

                  <img src="{{ asset('/uploads/avatars/default.jpg') }}" style="width:270px; height: 270px; float: left; border-radius: 50%;">
<div>
<h3 style="margin-left: 30px">{{ Auth::user()->name}}'s Profile</h3>
<pre>
UserName : {{ Auth::user()->name }}
Email : {{ Auth::user()->email }}
                </pre>

</div>
</div>
<div class="col-md-5" style="margin-top: 70px;">
@if(count($errors) >0)
                     <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach
                     </div>
@endif 
    <div class="infor" >
        <div class="panel panel-default">
            <div class="panel-heading"><h3 align="center">Edit Profile Information</h3></div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" action="" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div >       
                            <label>UserName</label>
                            <input type="text" name="name" class="form-control" aria-describedby="basic-addon1" value="{{ $user->name }}" ">
                        </div> 
                        <div style="margin-top: 20px">
                           <label> Email</label>
                            <input type="email" name="email " value="{{$user->email}}" class="form-control" aria-describedby="basic-addon1" readonly="">
                       </div>
                        <div style="margin-top: 20px">
                        <input type="checkbox" id="changePassword" name="changePassword">
                           <label> New Password</label>
                            <input type="password" name="password"  class="form-control password" aria-describedby="basic-addon1" placeholder="Enter New Password" disabled="">
                       </div>
                       <div style="margin-top: 20px">
                       <label>
                        Confirm Password</label>
                         <input type="password" name="passwordAgain"  placeholder="Enter Confirm Password" class="form-control password" aria-describedby="basic-addon1" disabled="">
                        </div>
                        <div style="margin-top: 20px" align="center">     
                            <input type="submit" class=" btn-sm btn-primary" value="submit" >
                        </div>    
                            
                       
                    </form>
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
    @section('script')
        <script>
            $(document).ready(function(){
                $("#changePassword").change(function(){
                    if($(this).is(":checked"))
                    {
                        $(".password").removeAttr('disabled');
                    }
                    else
                    {
                        $(".password").attr('disabled','')
                    }
                });
            });
        </script>

</body>
</html>
