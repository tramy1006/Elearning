@extends('layouts.app')

@section('content')
    <h3 class="page-title">List Result</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
                <thead>
                
                    <tr>
                    @if(Auth::user()->role >=1)
                        <th>User</th>
                    @endif
                        <th>Lesson</th>
                        <th>Date</th>
                        <th>Result</th>
                        <th>View</th>
                    </tr>
                </thead>

                <tbody>
                   
                        @foreach ($results as $result)
                            <tr>
                            @if(Auth::user()->role>=1)
                                <td>{{ $result->user->name or '' }} ({{ $result->user->email or '' }})</td>
                            @endif
                                <td>{{ $result->lesson->title or '' }}</td>
                                <td>{{ $result->created_at or '' }}</td>
                                <td>{{ $result->result }}/<?php
                                        $count = DB::table('lessons')->join('questions','lessons.id','=','questions.lesson_id')->where('lesson_id',$result->lesson_id)->count();
                                        echo $count;
                                     ?></td>
                                <td>
                                    <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-xs btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                   
                </tbody>
            </table>
        </div>
    </div>
@stop
