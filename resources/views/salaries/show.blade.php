@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="show">
		    <h1><strong>Salary Details</strong> </h1>
		    <hr>
		    <h3><b> Invoice No:</b> {{ $salary->invoice_no }}</h3>
		    <h3><b>Name :</b> {{ $salary->name }}</h3>
		    <h3><b>Amount:</b> {{ $salary->amount }} BDT.</h3>
		    <h3><b>Information:</b> {{ nl2br(e($salary->info)) }}</h3>
		    <h3><b>Create date:</b> {{ $salary->created_at->diffForHumans() }}</h3>
		    <h3><b>Update date:</b> {{ $salary->updated_at->diffForHumans() }}</h3>
		    <hr>
		    <div class="text-center"">
	            <a href="{{route('salaries.edit', $salary)}}" class="btn btn-primary btn-sm">Edit</a>
	            <form class="form-inline" method="post"
	                action="{{route('salaries.destroy', $salary)}}"
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