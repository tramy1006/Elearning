@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 70px" >
    <div class="row">
        <div class="col-lg-9" >

         <form  method="post" action="/forum/add" >
            <input type="hidden" name="_token" value="{{csrf_token() }}"/>
           
            <div class="form-group" >
                <label>Title:</label>
                <input type="text" class="form-control" name="title"  >
                            
            </div>
            <div class="form-group" >
                <label>Category</label>
                <select class="form-control" name="category">
                    @foreach($cate as $tl)
                        <option value="{{$tl->id}}">{{$tl->name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group" >
                <label>Body</label>
                <textarea type="text" class="form-control" name="noidung" rows="5"></textarea>
                            
            </div>
             <div class="button" align="center">
                <button type="submit" class="btn btn-primary" role="button" style="margin-right: 20px"><i class="fa fa-plus-circle"></i>Add Question</button>
                <button type="reset" class="btn btn-primary"><i class="fa fa-refresh"></i>Reset</button> 
                        </div>
        </form>
        </div>

        

    </div>
    <!-- /.row -->
</div>
@endsection
