@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1" >
       		<div class="col-md-2"></div>
       		<div class="col-md-8">
             <div class="panel panel-default">
             	
                <div class="panel-heading" align="center">List Category</div>
	              	<div class="panel-body">
		                 <div class="bs-example" data-example-id="paned-without-body-with-table">
		                    <div class="panel panel-default">
		                       
		                        <table class="table" >

		                            <thead>
		                                <tr >
		                                	<th>ID</th>
		                                    <th>Category Name</th>
		                                    <th>Start Lesson</th>
		                                     
		                                </tr>
		                            </thead>
		                            <tbody>
		                            @foreach($cate as $theloai)
		                           		<tr >
		                           			<td>{{ $theloai->id}}</td>
		                           			<td>{{$theloai->name}}</td>
		                           			<td><button>Start</button></td>    			
		                           		</tr>
		                           	@endforeach
		                            </tbody>
		                             
		                        </table>
		                       
		                    </div>
		                </div>
	             </div>   
	             </div>
            </div>
        </div>
    </div>
</div>
@endsection
