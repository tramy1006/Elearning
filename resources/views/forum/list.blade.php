@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 70px">
    <div class="row">
    <div class="col-md-2"></div>
        <div class="col-lg-8" >
            <div style="background-color: #ad1616;height:40px;width: 100%">
               <div class="left" style="float: left;padding-top: 2px"><a style="float: left" href="{{ url('/forum/add') }}" >Add Question
                </a>
                </div>
                <div class="right" style="float: right;padding-top: 7px">
                  <label>search </label>
                  <input type="text" class="field small-field" />
                  <input type="submit" class="button" value="search" />
                </div>
            </div>
            <div class="forum" style="margin-top: 20px;width: 100%;margin-left: 50px">
                <table  border="0" cellspacing="0" cellpadding="0" width="100%">
                      <tr>
                        
                        <th>Post</th>
                        <th>Date</th>
                        <th>Posted by</th>
                        
                      </tr>
                    
                      <hr>
                    <tbody>
                    @foreach($post as $pt)

                        <tr>
                            <td><a href="/forum/chitiet/{{$pt->id}}"> {{$pt->title}}</a></td>
                            <td>{{$pt->created_at}}</td>
                            <td>{{$pt->users->name}}</td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
@endsection
