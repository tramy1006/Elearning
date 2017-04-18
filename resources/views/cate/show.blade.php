@section('title')
Categoies
@endsection
@extends('layouts.ad')
@section('content')
			 <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center">List Category
                            
                        </h1>
                    </div>
                   <div class="count" style="margin-bottom: 20px">
                   Tổng số category: {{$category}}
                  
                   </div>
                    <table class="table table-striped table-bordered "  style="background: #C1CDCD;" >
                         <form method="POST" action="/cate/destroy">
                                <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                        <thead>
                            <tr align="center">
                            <th></th>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($cate as $theloai)
                            <tr class="odd gradeX" >
                            <td><input type="checkbox" name="checked[]" value="{{$theloai->id}}">  </td>    
                               
                            <td>{{ $theloai->id}}</td>
                            <td>
                                {{$theloai->name}}
                            </td>

                            <td >
                                <a class="btn btn-danger" href="delete/{{$theloai->id}}"><span class="fa fa-trash-o fa-fw"></span>Delete</a>
                            </td>

                            <td>
                                <a class="btn btn-primary" href="edit/{{$theloai->id}}"><span class="fa fa-pencil fa-fw"></span>Edit</a>
   
                            </td>

                                         
                                        
                            </tr>
                        @endforeach
                        </tbody>
                        <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o fa-fw"></span>Delete</button>
                        </form>
                    </table>
                    <div class="ptrang" align="right">
                    {!!$cate->render()!!} </div>
                </div>
                <!-- /.row -->
            </div>
@endsection
