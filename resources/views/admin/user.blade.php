@section('title')
Users
@endsection
@extends('layouts.ad')

@section('content')
             <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User List
                            
                        </h1>
                    </div>
                    <div class="count" style="margin-bottom: 20px">
                       Tổng số user: {{$user}}
                    </div>
                     <table class="table table-striped table-bordered "  style="background: #C1CDCD;" >
                   
                    <form method="POST" action="/user/destroy">
                                <input type="hidden" name="_token" value="{{csrf_token() }}"/>
                        <thead>

                            <tr align="center">
                            <th></th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="odd gradeX" >
                            <td><input type="checkbox" name="checked[]" value="{{$user->id}}">  </td>    
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</a></td>
                                <td>{{ $user->email }}</td>
                                 <td>
                                    @if(Auth::user()->role == 1 || $user->id == 1)
                                    <b>Disaled</b>
                                    @else
                                        <div class="form-group" style="margin-bottom:0px">
                                            <form method="post" action="/update-role/{{ $user->id }}">
                                            {{ csrf_field()}}
                                                <select class="form-control" name="role" onchange="this.form.submit();">
                                                    <option value="2" {{ (($user->role) == 2) ? 'selected': null }}>Admin</option>
                                                    <option value="1" {{ (($user->role) == 1) ? 'selected': null }}>Manager</option>
                                                    <option value="0" {{ (($user->role) == 0) ? 'selected': null }}>User</option>
                                                </select>
                                            </form>
                                            
                                        </div>
                                    @endif
                                    </td>
                                 
                                    <td>
                                    @if(Auth::user()->role == 1 || $user->id == 1)
                                    <b>Disaled</b>
                                    @else
                                    <a href="user/delete/{{$user->id}}" class="btn btn-xs btn-danger"><i class="fa fa-trash-o fa-fw" ></i>Delete</a>
                                    @endif
                                    </td>
                                 
                                
                            </tr>
                           
                             @endforeach
                        </tbody>
                        <button type="submit" class="btn btn-danger"><span class="fa fa-trash-o fa-fw"></span>Delete</button>
                    </form>
                    </table>
                    <div class="ptrang" align="right">
                    {!!$users->render()!!} </div>
                </div>
                <!-- /.row -->
            </div>
    
@endsection
