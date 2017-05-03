@section('title')
Question Option
@endsection
@extends('layouts.ad')

@section('content')
    <h3 class="page-title">Question Option</h3>

    <p>
        <a href="{{ route('questions_options.create') }}" class="btn btn-success">Add New</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($questions_options) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>Question_ID</th>
                        <th>Question</th>
                        <th>Option</th>
                        <th>Correct</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($questions_options) > 0)
                        @foreach ($questions_options as $questions_option)
                            <tr data-entry-id="{{ $questions_option->id }}">
                                <td></td>
                                <td>{{ $questions_option->question->id or '' }}</td>
                                <td>{{ $questions_option->question->question_text or '' }}</td>
                                <td>{{ $questions_option->option }}</td>
                                <td>{{ $questions_option->correct == 1 ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('questions_options.show',[$questions_option->id]) }}" class="btn btn-xs btn-primary">View</a>
                                    <a href="{{ route('questions_options.edit',[$questions_option->id]) }}" class="btn btn-xs btn-info">Edit</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['questions_options.destroy', $questions_option->id])) !!}
                                    {!! Form::submit(trans('Delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
