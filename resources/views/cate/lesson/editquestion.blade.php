@section('title')
Question
@endsection
@extends('layouts.ad')

@section('content')
    <h3 class="page-title">Question</h3>
    
    
    <form method="post" action="/questions/edit/{{$question->id}}">
    <div class="panel panel-default">
        <div class="panel-heading">
           Edit
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lesson_id', 'Lesson*', ['class' => 'control-label']) !!}
                    {!! Form::select('lesson_id', $lessons, old('lesson_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lesson_id'))
                        <p class="help-block">
                            {{ $errors->first('lesson_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question_text', 'Question text*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('question_text', old('question_text'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_text'))
                        <p class="help-block">
                            {{ $errors->first('question_text') }}
                        </p>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('answer_explanation', 'Answer explanation*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('answer_explanation', old('answer_explanation'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('answer_explanation'))
                        <p class="help-block">
                            {{ $errors->first('answer_explanation') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('more_info_link', 'More info link', ['class' => 'control-label']) !!}
                    {!! Form::text('more_info_link', old('more_info_link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('more_info_link'))
                        <p class="help-block">
                            {{ $errors->first('more_info_link') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <input type="submit" value="Update" class="btn btn-danger" >
    
   </form>
@stop

