@extends('layouts.app')

@section('content')
<div id="register" class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Add New Record</h2>
            </div>
            <div class="panel-body">
                {!! Form::open(['url' => '/records', 'method' => 'post'], ['class' => 'form-group']) !!}
	                <div class="form-group">
                        {!! Form::label('invoice_no', 'Invoice #', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::text('invoice_no') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::text('title') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('amount', 'Amount', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::number('amount') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('info', 'Information', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::textarea('info') !!}
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            {!! Form::submit('Add', ['class' => 'btn btn-success center-block']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection