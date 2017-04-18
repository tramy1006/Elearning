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
	<?php 
		function doimau($str,$tukhoa)
		{
			return str_replace($tukhoa, "<span style='color:red;'>$tukhoa</span>", $str);
		}
	 ?>
<div class="col-md-9 ">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color:#337AB7; color:white;">
            <h4 align="center"><b >Từ khóa: {{$tukhoa}}</b></h4>
        </div>

        @foreach($less as $lesson)
            <div class="row-item row">
                       
                <div class="col-md-3" >
                    <br>
                        <video width="200px" height="200px" class="img-responsive" >
                            <source  src="{{$lesson->media}}" type="video/mp4" >
                        </video>
                            
                </div>

                <div class="col-md-9" >
                    <h3>{!! doimau($lesson->title,$tukhoa) !!}</h3>
                    <p>{!!doimau($lesson->tomtat,$tukhoa)!!}</p>
                    <a class="btn btn-primary" href="/cate/lesson/{{$lesson->id}}">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>

                        
                <div class="break"></div>
            </div> 
            @endforeach

                   

    </div>
</div> 
@endsection
