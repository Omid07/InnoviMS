@extends('layouts.app')
@section('content')
	<center><h1>{{ $client->name }}</h1></center>
	</br>
	<div class="container">
	    <table class="table table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Information</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
	            <tr>
					<td>{!! $client->id !!}</td>
					<td>{!! $client->name !!}</td>
					<td>{!! nl2br(e($client->info)) !!}</td>
					<td>
						{{ Form::open([ "url" => "/client/$client->id/edit", 'method' => 'post']) }}
							<button  type="submit" class="btn btn-primary button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
						{{ Form::close() }}
						{{ Form::open([ "url" => "/client/$client->id/delete", 'method' => 'delete']) }}
							<button class="btn btn-danger button2" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
						{{ Form::close() }}
					</td>
                </tr>  
	        </tbody>
	    </table>
	</div>
@endsection