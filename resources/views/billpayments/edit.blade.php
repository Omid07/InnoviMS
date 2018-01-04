@extends('layouts.app')

@section('content')
	<div class="container">
		<center><h2>Edit Record - {{ $billpayment->title }}</h2></center>
		{{ Form::open([ "url" => "/billpayments/$billpayment->id", 'method' => 'put', $billpayment->id]) }}
			<div class="form-group">
		        {!! Form::label('invoice_no', 'Invoice No:', ['class' => 'control-label']) !!}
		        {!! Form::text('invoice_no', $billpayment->invoice_no, ['class' => 'form-control']) !!}
		    </div>
			<div class="form-group">
		        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
		        {!! Form::text('title', $billpayment->title, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('amount', 'Amount:', ['class' => 'control-label']) !!}
		        {!! Form::number('amount', $billpayment->amount, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
		        {!! Form::label('info', 'Information:', ['class' => 'control-label']) !!}
		        {!! Form::textarea('info', $billpayment->info, ['class' => 'form-control']) !!}
		    </div>
		    <div class="form-group">
                {!! Form::label('type', 'Type', ['class' => 'col-sm-3 control-label']) !!}
                {!! Form::select('type', array('Client' => 'Client', 'Vendor' => 'Vendor')) !!}
            </div>
		    <div>
		        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
		    </div>
		{{ Form::close() }}
	</div>
@endsection