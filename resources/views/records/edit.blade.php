@extends('layouts.app')

@section('content')
	<div class="container">
		<center><h2>Edit Record - {{ $record->title }}</h2></center>
		{{ Form::open([ "url" => "/records/$record->id", 'method' => 'put', $record->id]) }}
			<div class="form-group">
		        {!! Form::label('invoice_no', 'Invoice No:', ['class' => 'control-label']) !!}
		        {!! Form::text('invoice_no', $record->invoice_no, ['class' => 'form-control']) !!}
		    </div>
			<div class="form-group">
		        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
		        {!! Form::text('title', $record->title, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('amount', 'Amount:', ['class' => 'control-label']) !!}
		        {!! Form::number('amount', $record->amount, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('info', 'Information:', ['class' => 'control-label']) !!}
		        {!! Form::textarea('info', $record->info, ['class' => 'form-control']) !!}
		    </div>
		    <div>
		        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
		    </div>
		{{ Form::close() }}
	</div>
@endsection