@extends('layouts.app')

@section('content')
<div id="register" class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Add a New Client</h2>
            </div>
            <div class="panel-body">
                {!! Form::open(['url' => '/client/store'], ['class' => 'form-group']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::text('name') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('info', 'Information', ['class' => 'col-sm-3 control-label']) !!}
                        {!! Form::textarea('info') !!}
                    </div>
                    <div class="form-group">
                    	{!! Form::label('type', 'Type', ['class' => 'col-sm-3 control-label']) !!}
                    	{!! Form::select('type', array('Client' => 'Client', 'Vendor' => 'Vendor')) !!}
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