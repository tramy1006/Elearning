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
<div class="container" style="margin-top: 80px">
@if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
    <div class="col-md-2" style="float: left;"></div>
    <div class="col-md-4" style="margin-top: 70px"> 

                  <img src="{{ $user->avatar}}" style="width:270px; height: 270px; border-radius: 50%;">
                   @if(Auth::user()->facebook_id == '')    
                  <form enctype="multipart/form-data" action="/profile" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table >
                            <tr>
                                <td >
                                    <label style="margin-top:20px;">Update Avatar</label>
                                </td>
                            </tr>
                            <tr> 
                                <td>
                                    <input type="file" name="avatar" style="margin-top:20px">
                                </td>
                            </tr>
                                    
                            <tr>
                                <td> 
                                    <input type="submit" class=" btn-sm btn-primary" value="submit" style="margin-top:30px; margin-left: 100px">
                                </td>
                            </tr>
                        </table>
                </form>
                @endif
            </div>
            <div class="col-md-4" style="margin-top: 100px">
                
<h3 style="margin-left: 30px">{{ Auth::user()->name}}'s Profile</h3>
<pre>
UserName : {{ Auth::user()->name }}
Email : {{ Auth::user()->email }}
                </pre>

                      @if(Auth::check()) 
                       @if(Auth::user()->role <= 1 && Auth::user()->facebook_id == '')             
                 <button type="submit" class="btn btn-primary" style="margin-left: 50px"><a href="/profile/edit/{{$user->id}}" style="color: #fff">Setup Profile</a></button>
                 @endif
                 @endif
            </div>
            <div class="col-md-2" style="float: right;"></div>

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
