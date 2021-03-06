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
<div class="col-md-9 ">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color:#337AB7; color:white;">
            <h4 align="center"><b >{{$catt->name}}</b></h4>
        </div>

        @foreach($less as $lesson)
            <div class="row-item row">
                <div class="col-md-5" style="height:200px; border: 1px solid #000; margin-top:15px;margin-left: 42px;background-color: #EEE9E9"> 
       
               <div class="col-md-5" >
                    <br>
                        <video width="200px" height="200px" class="img-responsive" poster="{{$lesson->hinh}}">
                            <source  src="{{$lesson->media}}" type="video/mp4" >
                        </video>
                        <a class="btn btn-primary" href="/cate/lesson/{{$lesson->id}}" style="margin-top: 10px; width:110px">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                            
                </div>
                <div class="col-md-7" >
                    <h3>{{$lesson->title}}</h3>
                    <p>{{$lesson->tomtat}}</p>
                    
                </div>
                        
                <div class="break"></div>
            </div> 
            @endforeach

            </div>
 <div class="ptrang" style="margin-top: 30px" align="center">
                    {!!$less->render()!!} </div>
                </div>
                   

    </div>
</div> 
@endsection
