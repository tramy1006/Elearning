@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 70px">
    <div class="row">
        <div class="col-lg-9">

            <h1 align="center">{{$less->title}}</h1>
   
            <p>
            @if($less->media != '')
                <video width="800px" height="300px" controls  >
    					
                        <source class="img-responsive"
                        src="{{asset('/uploads/lesson/video/'.$less->media)}}" type="video/mp4">
    			</video>
            @else
             <audio controls style="margin-top: 50px;">
                    <source src="{{asset('/uploads/lesson/audio/'.$less->audio)}}" type="audio/ogg">
            </audio>
            @endif
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
            
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form  action="" method="post" class="ajax">
                <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                    <div class="form-group">
                        <textarea class="form-control" name="noidung" id="noidung" rows="3"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="gửi">
                </form>
            </div>

            <hr>
             @foreach($less->comments as $cmt)
            <div class="media">
                <a class="pull-left" href="#">
                    <img style="width: 30px; height: 30px" class="media-object" src="{{$cmt->users->avatar}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$cmt->users->name}}
                        <small>{{$cmt->created_at}}</small>
                    </h4>
                    {{$cmt->noidung}}
                </div>
            </div>
            @endforeach        

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

           
            
        </div>

    </div>
    <!-- /.row -->
</div>
@endsection
<script>
    $('form.ajax').on('submit', function(){
        console.log('trigger');
        return false;
    });
</script>