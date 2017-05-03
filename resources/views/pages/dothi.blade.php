@section('title')
Users
@endsection
@extends('pages.admin')

@section('content')

<div >
            {!! $chart->render() !!}
    </div>
    </br>
     <div>
            {!! $ch->render() !!}
 </div>
@endsection