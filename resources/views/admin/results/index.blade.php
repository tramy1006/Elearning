@section('title')
Result
@endsection
@extends('layouts.app')

@section('content')
    <h3 class="page-title">My Results</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
           List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                     @if(Auth::user()->role >= 1)
                        <th>User</th>
                    @endif
                        <th>Lesson</th>
                        <th>Date</th>
                        <th>Result</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($results) > 0)
                        @foreach ($results as $result)
                            <tr>
                            @if(Auth::user()->role >= 1)
                                <td>{{ $result->user->name or '' }} ({{ $result->user->email or '' }})</td>
                            @endif
                                <td>{{ $result->lesson->title or '' }}</td>
                                <td>{{ $result->created_at or '' }}</td>
                                <td>{{ $result->result }}/10</td>
                                <td>
                                    <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-xs btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop
