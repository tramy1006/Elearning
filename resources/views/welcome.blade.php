@extends('layouts.app')
@section('slide')

    @include('pages.slide')

@endsection
@section('menu')
<div class="col-md-3" style="float: left;">
    @include('pages.menu')
</div>
@endsection
@section('content')
<div class="col-md-9" style="float: right;">
<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
        <h2 style="margin-top:0px; margin-bottom:0px;" align="center">Welcome to website</h2>
    </div>

        <div class="panel-body">      
                
            <span><img src="http://2.bp.blogspot.com/--4gNx8gPH_c/U4Lz7rlNlTI/AAAAAAAAHmA/iavZFgJ4GOI/s1600/Welcome.jpg" width="800px" /></span>
               
       </div>
</div>
</div>

@endsection
