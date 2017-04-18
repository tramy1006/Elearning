@section('title')
Question
@endsection
@extends('layouts.ad')

@section('content')
    <h3 class="page-title">Question</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
           View
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr><th>Lesson</th>
                    <td>{{ $question->lesson->title or '' }}</td></tr><tr><th>Question text</th>
                    <td>{!! $question->question_text !!}</td></tr><tr><th>Code snippet</th>
                    <td>{!! $question->code_snippet !!}</td></tr><tr><th>Answer explanation</th>
                    <td>{!! $question->answer_explanation !!}</td></tr><tr><th>More info link</th>
                    <td>{{ $question->more_info_link }}</td></tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('questions.index') }}" class="btn btn-default">Back to list</a>
        </div>
    </div>
@stop