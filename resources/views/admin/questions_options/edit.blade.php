@section('title')
Question Option
@endsection
@extends('layouts.ad')

@section('content')
    <h3 class="page-title">Questions Options</h3>
    
    {!! Form::model($questions_option, ['method' => 'PUT', 'route' => ['questions_options.update', $questions_option->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('question_id', 'question*', ['class' => 'control-label']) !!}
                    {!! Form::select('question_id', $questions, old('question_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('question_id'))
                        <p class="help-block">
                            {{ $errors->first('question_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('option', 'Option*', ['class' => 'control-label']) !!}
                    {!! Form::text('option', old('option'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('option'))
                        <p class="help-block">
                            {{ $errors->first('option') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">

                    {!! Form::label('correct', 'Correct', ['class' => 'control-label']) !!}
                    @if($questions_option->correct == 0)
                    {!! Form::hidden('correct', 0) !!}
                     <input type="radio" name="correct" id="correct" value="1"  /> yes
                    <input type="radio" name="correct" id="correct" value="0" checked="checked"/> no
                    @else($questions_option->correct == 1)
                    {!! Form::hidden('correct', 1) !!}
                    <input type="radio" name="correct" id="correct" value="1" checked="checked" /> yes
                    <input type="radio" name="correct" id="correct" value="0" /> no
                    <!-- <input class="form" type="checkbox" value="0" name="correct" checked id="correct" :not(:checked)> -->
                    @endif
                    <p class="help-block"></p>
                    @if($errors->has('correct'))
                        <p class="help-block">
                            {{ $errors->first('correct') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
   <script>
   $("input:checkbox:not(:checked)")
   </script>
@stop

