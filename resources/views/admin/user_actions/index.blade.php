@section('title')
Users
@endsection
@extends('layouts.ad')

@section('content')
    <h3 class="page-title">User Actions</h3>

    <p>
        
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            List
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($user_actions) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>User</th>
                        <th>Action</th>
                        <th>Action Model</th>
                        <th>Action id</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($user_actions) > 0)
                        @foreach ($user_actions as $user_action)
                            <tr data-entry-id="{{ $user_action->id }}">
                                
                                <td>{{ $user_action->user->name or '' }}</td>
                                <td>{{ $user_action->action }}</td>
                                <td>{{ $user_action->action_model }}</td>
                                <td>{{ $user_action->action_id }}</td>
                                
                            </tr>
                        @endforeach
                   
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

