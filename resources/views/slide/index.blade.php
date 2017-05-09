@section('title')
Slide
@endsection
@extends('layouts.ad')
@section('content')
			 <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center">List Slide
                            
                        </h1>
                    </div>
                   <div class="count" style="margin-top: 50px">
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
                   </div>
                    <table class="table table-striped table-bordered "  style="background: #C1CDCD;" >
                     <form method="POST" action="/slide/destroy">
                                <input type="hidden" name="_token" value="{{csrf_token() }}"/>

                    <div class="count" style="margin-bottom: 20px">
                   Tổng số Slide: {{$slides}}
                   </div>
                    
                        <thead align="center">

                            <tr align="center">
                                <th></th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Hình</th>
								                <th >Created_at</th>
                                <th >Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($slide as $st)

                            <tr class="odd gradeX" >
                            <td><input type="checkbox" name="checked[]" value="{{$st->id}}">  </td>

                            <td>{{ $st->id}}</td>
                            <td>{{$st->name}}</td>

                            <td style="width: 200px; height: 200px">
                                <img width="200px" height="200px" src="{{$st->hinh}}">
                               
                            </td>
                              <td>
                                {{$st->created_at}}
                            </td>
                            <td class="center">
                              
                                <a  href="/slide/delete/{{$st->id}}" class="btn btn-xs btn-danger"><i class="fa fa-trash-o fa-fw" ></i>Delete</a>

                            </td>
                            <td class="center">
                                
                                 <a href="/slide/edit/{{$st->id}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil fa-fw" ></i>Edit</a>
                            </td>

                                         
                                        
                            </tr>
                        @endforeach
                        </tbody>
                        <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o fa-fw"></span>Delete</button>
                        </form>
                    </table>
                    <div class="ptrang" align="right">
                    {!!$slide->render()!!} </div>
                </div>
                <!-- /.row -->
            </div>
@endsection
