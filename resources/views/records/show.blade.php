@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="show">
		    <h1><strong>Record Details</strong> </h1>
		    <hr>
		    <h3><b> Invoice No:</b> {{ $record->invoice_no }}</h3>
		    <h3><b>Title :</b> {{ $record->title }}</h3>
		    <h3><b>Amount:</b> {{ $record->amount }} BDT.</h3>
		    <h3><b>Information:</b> {{ nl2br(e($record->info)) }}</h3>
		    <h3><b>Create date:</b> {{ $record->created_at->diffForHumans() }}</h3>
		    <h3><b>Update date:</b> {{ $record->updated_at->diffForHumans() }}</h3>
		    <hr>
		    <div class="text-center"">
	            <a href="{{route('records.edit', $record)}}" class="btn btn-primary btn-sm">Edit</a>
	            <form class="form-inline" method="post"
	                action="{{route('records.destroy', $record)}}"
	                onsubmit="return confirm('Are you sure?')"
	            >
	                <input type="hidden" name="_method" value="delete">
	                <input type="hidden" name="_token" value="{{csrf_token()}}">
	                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
	            </form>
            </div>
		</div>
	</div>
@endsection