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
       
            <div class="row-item row">
             @foreach($less as $les)
                <div class="col-md-5" style="width: 370px; height:170px; border: 1px solid #000; margin-top:15px;margin-left: 42px;background-color: #EEE9E9"> 
       
                   <div class="col-md-5" >
                        <br>
                            <img style="width: 100px; height: 80px" class="img-responsive" src="{{$les->hinh}}">
                               
                            <a class="btn btn-primary" href="/cate/lesson/{{$les->id}}" style="margin-top: 20px;width: 100px">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                                
                    </div>
                    <div class="col-md-7" >
                        <h3>{{$les->title}}</h3>
                        <p>{{$les->tomtat}}</p>
                        
                    </div>

                         
                    
                </div> 
            @endforeach    
 
            </div>   
    </div>
        
</div> 
@endsection
