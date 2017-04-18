@section('title')
Add Categoies
@endsection
@extends('layouts.ad')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Add Category</h1>
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
                </div>
            @endif
                <div class="panel">
                    <form method="post" action="add" >
                        <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                            <div class="form-group" >
                                <label>Category Name:</label>
                                <input type="text" class="form-control" name="name"  placeholder="Please enter Category Name" >
                        
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" role="button" "><i class="fa fa-plus-circle"></i>Add Category</button>
                                <button type="reset" class="btn btn-primary"><i class="fa fa-refresh"></i>Reset</button> 
                            </div>
                    </form>
                               
                </div>
            </div>
        </div>
    </div>
@endsection
