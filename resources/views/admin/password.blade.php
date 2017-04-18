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

@if(count($errors) >0)
                     <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}} <br>
                        @endforeach
                     </div>
@endif 
  <div class="pass" style="margin-top: 20px; margin-left: 150px">
            <div class="panel panel-default">
            <div class="panel-heading"><h3 align="center">Update Password</h3></div>
            <div class="panel-body">
        <form enctype="multipart/form-data" action="/profile/edit/password/{{$user->id}}" method="POST" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                   <div>
                        <label>Old Password</label>
                         <input type="password" name="pass" class="form-control" aria-describedby="basic-addon1" placeholder="Enter Old Password">
                    </div>
                    <div>
                       <label> New Password</label>
                        <input type="password" name="password " class="form-control" aria-describedby="basic-addon1" placeholder="Enter New Password" >
                   </div>
                   <div>
                   <label>
                    Confirm Password</label>
                     <input type="password" name="password" placeholder="Enter Confirm Password" class="form-control" aria-describedby="basic-addon1">
                    </div>
                        <input type="submit" class=" btn-sm btn-primary" value="submit" >
                   
        </form>

    </div>
   </div>
   </div>
   </div>

</div>
@endsection