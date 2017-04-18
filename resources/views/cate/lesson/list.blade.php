@section('title')
Lessons
@endsection
@extends('layouts.ad') 
@section('content')  
      <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" align="center">List Lesson
                            
                        </h1>
                    </div>
                    <div class="count" style="margin-bottom: 20px">
                       Tổng số lesson: {{$lessons}}
                    </div>
                   
                    <table class="table table-striped table-bordered "  style="background: #C1CDCD;" >
                    <form method="POST" action="/lesson/destroy">
                                <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                        <thead>
                           
                            <tr  style="background: #C1CDCD;" >
                                <th></th>
                                <th>ID</th>
                                <th style="width:150px" align="center" >Tiêu Đề</th>
                                <th style="width:300px;">Tóm Tắt</th>
                                <th>Category</th>
                                <th style="width: 200px">Video</th>
                                
                                <th style="width: 80px">Xem</th>
                                <th style="width: 80px">Nổi Bật</th>
                                <th>Total Question</th>

                                <th >Question</th>
                                <th>Start Lesson</th>
                                <th style="width: 80px;">Delete</th>
                                <th style="width: 80px;">Edit</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach($less as $lesson)
                            <tr class="even gradeC" >
                               
                                <td><input type="checkbox" name="checked[]" value="{{$lesson->id}}"> </td>
                                <td>{{$lesson->id}}</td>
                                <td>
                                    <p><a href="/lesson/list/{{$lesson->id}}/question"> {{$lesson->title}}</a></p>
                                    <img style="width:150px; height: 150px" src="{{$lesson->hinh}}">
                                </td>
                                <td>{{$lesson->tomtat}}</td>
                                <td>{{$lesson->categories->name}}</td>
                                <td>
                                <video width="200" height="150px" controls>
                                    <source 
                                    src="{{asset('/uploads/lesson/video/'.$lesson->media)}}" type="video/mp4">
                                </video>
                                </td>

                                <td align="center">
                                    {{$lesson->luotxem}}
                                </td>
                                <td align="center">
                                @if($lesson->noibat == 0)
                                    {{'không'}}
                                @else
                                    {{'có'}}
                                @endif
                                </td>  
                                <td>
                                <?php
                                    $count = DB::table('lessons')->join('questions','lessons.id','=','questions.lesson_id')->where('lesson_id',$lesson->id)->count();
                                    echo $count;
                                 ?>
                                     
                                 </td>
                                <td > <a href="/add/{{$lesson->id}}" class="btn btn-primary"> <i class="glyphicon glyphicon-plus"></i>Add </a></td>             
                                <td class="center">
                                  
                                     <a href="delete/{{$lesson->id}}" class="btn btn-danger"> <i class="fa fa-trash-o fa-fw"></i>Delete</a>

                                </td>
                                <td class="center">
                                    <a href="edit/{{$lesson->id}}" class="btn btn-primary"><i class="fa fa-pencil fa-fw" ></i>Edit</a>
                                </td>

                            </tr>
                        @endforeach
                           
                        </tbody>
                         <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o fa-fw"></span>Delete</button>
                        </form>
                    </table>
                    <div class="ptrang" align="right">
                    {!!$less->render()!!} </div>
                </div>
                <!-- /.row -->
            </div>
@endsection
