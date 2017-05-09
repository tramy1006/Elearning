@section('title')
Add Lesson
@endsection
@extends('layouts.ad')

@section('content')
    <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Lesson
                            
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
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
                        </div>@endif
                        <form  action="add" method="POST" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                        <div class="form-group" >
                            <label>Category Parent</label>
                            <select class="form-control" name="category">
                            @foreach($cate as $tl)
                                <option value="{{$tl->id}}">{{$tl->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="tieude" placeholder="Nhập tiêu đề">
                        </div>
                        
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <input class="form-control" name="tomtat" placeholder="Nhập tóm tắt">
                        </div>
                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea id="demo" name="noidung" class="form-control ckeditor" rows="5"></textarea>
                            
                        </div>
                         <div class="form-group">
                            <label>Level</label>
                            <label class="radio-inline">
                                <input name="level" value="0" checked="" type="radio"> Dễ
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="level" value="1">Trung bình
                            </label>
                             <label class="radio-inline">
                                <input type="radio" name="level" value="2">Khó
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Hình</label>
                            <input type="file" name="hinh" class="form-control">
                        </div>
                         <div class="form-group">
                            <label>Video</label>
                            <input type="file" name="media" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Audio</label>
                            <input type="file" name="audio" class="form-control">
                        </div>
                        <div class="button" align="center">
                            <button type="submit" class="btn btn-primary" role="button" style="margin-right: 20px"><i class="fa fa-plus-circle"></i>Add Category</button>
                            <button type="reset" class="btn btn-primary"><i class="fa fa-refresh"></i>Reset</button> 
                        </div>
                    </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        
@endsection
