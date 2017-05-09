@section('title')
Edit Lesson
@endsection
@extends('layouts.ad')

@section('content')
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Lesson
                        <small style="color: #092">{{$less->title}}</small>
                       
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                 <form  action="" method="POST" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                        <div class="form-group" >
                            <label>Category Parent</label>
                            <select class="form-control" name="category">
                            @foreach($cate as $tl)
                                <option 
                                    @if($less->categories->id == $tl->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$tl->id}}"> {{$tl->name}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="tieude" value="{{$less->title}}">
                        </div>
                        
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <input class="form-control" name="tomtat" value="{{$less->tomtat}}">
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea id="demo" name="noidung" class="form-control ckeditor" rows="5">{{$less->noidung}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Nổi Bật</label>
                            <label class="radio-inline">
                                <input name="level" value="0" 
                                @if($less->level == 0)
                                    {{"checked"}}
                                @endif
                                type="radio" /> Không
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="level" value="1"
                                @if($less->level == 1)
                                    {{"checked"}}
                                @endif
                                >Có
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Hình</label>
                            <p>
                                <img src="{{$less->hinh}}" style="width: 200px;height: 150px">

                            </p>

                            <input type="file" name="hinh" class="form-control">
                        </div>
                         <div class="form-group">
                            <label>Video</label>
                            <p>
                                <video width="200" height="150px" controls>
                                     <source 
                                    src="{{asset('/uploads/lesson/video/'.$less->media)}}" type="video/mp4">
                                </video>
                            </p>
                            <input type="file" name="media" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Audio</label>
                            <p>
                                <audio controls>
                                  <source src="{{asset('/uploads/lesson/audio/'.$less->audio)}}" type="audio/ogg">
                                  
                               
                                </audio>
                            </p>
                            <input type="file" name="audio" class="form-control">
                        </div>
                        <div class="button" align="center">
                            <button type="submit" class="btn btn-primary" role="button" style="margin-right: 20px"> <i class="fa fa-pencil fa-fw"></i>Edit Lesson</button>
                            <button type="reset" class="btn btn-primary"><i class="fa fa-refresh"></i>Reset</button> 
                        </div>
                    </form>
                   
                </div>
                <div class="col-md-12">
                 <div class="panel panel-default" style="margin-top: 30px">
                <div class="panel-body" >
                    <div align="center">    
                         <h2>Comment List</h2>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>  
                                    <th>Người dùng</th>
                                    <th>Nội Dung</th>
                                    <th>Ngày đăng</th>
                                    <th>Delete</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($less->comments as $cm)
                                <tr >
                                    <td>{{$cm->id}}</td>
                                    <td>{{$cm->users->name}}</td>
                                    <td>{{$cm->noidung}}</td>
                                    <td>{{$cm->created_at}}</td>
                                    <td class="center">
                                        <i class="fa fa-trash-o fa-fw"></i><a href="/comment/delete/{{$cm->id}}/{{$less->id}}">Delete</a>

                                    </td>
                               
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
            </div>
            </div>
            <!-- /.row -->
        </div>

@endsection
