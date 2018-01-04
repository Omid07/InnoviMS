@extends('layouts.app')

@section('content')
	<div class="container">
		<center><h2>Edit Salary - {{ $salary->title }}</h2></center>
		{{ Form::open([ "url" => "/salaries/$salary->id", 'method' => 'put', $salary->id]) }}
			<div class="form-group">
		        {!! Form::label('invoice_no', 'Invoice No:', ['class' => 'control-label']) !!}
		        {!! Form::text('invoice_no', $salary->invoice_no, ['class' => 'form-control']) !!}
		    </div>
			<div class="form-group">
		        {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
		        {!! Form::text('name', $salary->name, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('amount', 'Amount:', ['class' => 'control-label']) !!}
		        {!! Form::number('amount', $salary->amount, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('info', 'Information:', ['class' => 'control-label']) !!}
		        {!! Form::textarea('info', $salary->info, ['class' => 'form-control']) !!}
		    </div>
		    <div>
		        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
		    </div>
		{{ Form::close() }}
	</div>
@endsection