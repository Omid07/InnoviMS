@extends('layouts.app')

@section('content')
	<div class="container">

		<center><h2>Edit Client - {{ $client->name }}</h2></center>
		{{ Form::open([ "url" => "/client/$client->id", 'method' => 'put', $client->id]) }}
			<div class="form-group">
		        {!! Form::label('name', 'Title:', ['class' => 'control-label']) !!}
		        {!! Form::text('name', $client->name, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('info', 'Information:', ['class' => 'control-label']) !!}
		        {!! Form::textarea('info', $client->info, ['class' => 'form-control']) !!}
		    </div>
		    <div>
		        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
		    </div>
		{{ Form::close() }}
</div>
@endsection