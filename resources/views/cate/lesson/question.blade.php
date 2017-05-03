@section('title')
Lessons
@endsection
@extends('layouts.ad')
@section('content')  
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header" align="center">
              
                {{$lesson->title}}
                </h1>
                
            </div>
            <table class="table table-striped table-bordered "  style="background: #C1CDCD;" >
                
                <thead>
                    <tr>
                        
                        <th>Question</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>

                        <td>{{$question->question_text}}</td>
                        <td><a class="btn btn-primary" href="/questions/{{$question->id}}/edit"><span class="fa fa-pencil fa-fw"></span>Edit</a></td>
                        <td><a class="btn btn-danger" href="/lesson/list/question/delete/{{$question->id}}"><span class="fa fa-trash-o fa-fw"></span>Delete</a></td>
                    </tr>
                @endforeach()
                </tbody>
            </table>
                   
                    
        </div>
                
    </div>
@endsection
