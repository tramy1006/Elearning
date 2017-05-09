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
	        <h2 style="margin-top:0px; margin-bottom:0px;" align="center">Video nổi bật</h2>
	    </div>

	    <div class="panel-body">
	            		
	        @foreach($cate as $theloai)
	        	@if(count($theloai->lessons) >0 )
				<div class="row-item row">
			        <h3 style="margin-left: 80px">
			            {{$theloai->name}}	
			        </h3>
			        <?php 
			           //lay ra 5 tin cua lessons
			            $data = $theloai->lessons->sortByDesc('created_at')->take(5);
			                		//la ra 1 tin thi trong data con 4tin
			                $les = $data->shift();
			        ?>
			        <div class="col-md-8 border-right">

			            <div class="col-md-5">
			             @if($les->media != '')
				            <video width="200" height="150px" poster="{{$les['hinh']}}">
								<source src="{{$les['media']}}" type="video/mp4">
							</video>
						@else
						<img src="{{$les['hinh']}}" width="200" height="150px">
						@endif
				        </div>

				       <div class="col-md-7">
				            <h3>{{$les['title']}}</h3>
				            <p>{{$les['tomtat']}}</p>
				           
				            <a class="btn btn-primary" href="/cate/lesson/{{$les->id}}">Xem <span class="glyphicon glyphicon-chevron-right"></span></a>
						</div>

			        </div>
			                    
					<div class="col-md-4 border-right">
						@foreach($data->all() as $lesson)
						<a href="/cate/lesson/{{$lesson->id}}">
							<h4><span class="glyphicon glyphicon-list-alt"></span>
								{{ $lesson['title']}}
							</h4> 
						</a>
						@endforeach
					</div>
								
					<div class="break"></div>
			    </div>
			    @endif

		    @endforeach 
		    
		</div>
 	</div>
</div>
@endsection
