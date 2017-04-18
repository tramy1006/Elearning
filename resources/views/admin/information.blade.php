@extends('layouts.app')
@section('menu') 
<div class="col-md-3" style="float: left;">           
<ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active" align="center">
                        Setup
                    </li>

                    <li href="" class="list-group-item menu1">
                         <a href="/profile/edit/{{$user->id}}" >Information </a>
                    </li>
                     <li href="" class="list-group-item menu1">
                        <a href="/profile/edit/password/{{$user->id}}" >Password </a>
                    </li>
                    
                    
                </ul>
             </div>     
@endsection
@section('content')
<div class="col-md-9" style="float: right;">
<div class="col-md-2" style="float: left;"> </div>
<div class="col-md-5" >
@if(count($errors) >0)
                     <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach
                     </div>
@endif 
    <div class="infor" >
    <div class="panel panel-default">
            <div class="panel-heading"><h3 align="center">Edit Profile Information</h3></div>
            <div class="panel-body">
                <form enctype="multipart/form-data" action="" method="POST" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div >       
                        <label>UserName</label>
                        <input type="text" name="name" class="form-control" aria-describedby="basic-addon1" value="{{ $user->name }}" ">
                    </div> 
                    <div>    
                        <label>Email
                        </label>
                        <input type="text" name="email" class="form-control" aria-describedby="basic-addon1" value="{{ $user->email }}" >
                      </div> 
                      <div>     
                                <input type="submit" class=" btn-sm btn-primary" value="submit" style="margin-top:50px; ">
                        </div>    
                        
                   
                </form>
          </div>

            
</div>
<div class="col-md-2" style="float: right;"></div>
</div>
@endsection