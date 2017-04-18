@section('title')
Edit Slide
@endsection
@extends('layouts.ad')

@section('content')

        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 50px">
                        <h1 class="page-header" style="margin-left: 100px">Edit <span style="color:#0000CC" >{{$slide->name}}</span> 
                            
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px; margin-top: 20px">
                    @if(count($errors) >0)
                     <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach
                     </div>
                    @endif 
                   @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    
                     <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token() }}"/> 
                            <div class="form-group" >

                                <label>Slide Name: </label>
                                <input type="text" value="{{$slide->name}}" class="form-control" name="name" > 
                            </div>
                            <div class="form-group" >
                                <label>Hình</label>
                                <p><img style="width: 200px; height: 200px" src="{{$slide->hinh}}"></p>
                                <input type="file" class="form-control" name="hinh" >
                        
                            </div>

                            <div class="button" >

                                <button type="submit" class="btn btn-primary" role="button" style="margin-right: 20px"><i class="fa fa-pencil"></i>Edit</button>
                                <button type="reset" class="btn btn-primary" role="button"><i class="fa fa-refresh">Reset</i></button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
      
@endsection
