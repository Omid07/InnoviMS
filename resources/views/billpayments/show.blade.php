@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="show">
		    <h1><strong>Bill Details</strong> </h1>
		    <hr>
		    <h3><b> Invoice No:</b> {{ $billpayment->invoice_no }}</h3>
		    <h3><b>Title :</b> {{ $billpayment->title }}</h3>
		    <h3><b>Amount:</b> {{ $billpayment->amount }} BDT.</h3>
		    <h3><b>Type:</b> {{ $billpayment->type }}</h3>
		    <h3><b>Information:</b> {{ nl2br(e($billpayment->info)) }}</h3>
		    <h3><b>Create date:</b> {{ $billpayment->created_at->diffForHumans() }}</h3>
		    <h3><b>Update date:</b> {{ $billpayment->updated_at->diffForHumans() }}</h3>
		    <hr>
		    <div class="text-center"">
	            <a href="{{route('billpayments.edit', $billpayment)}}" class="btn btn-primary btn-sm">Edit</a>
	            <form class="form-inline" method="post"
	                action="{{route('billpayments.destroy', $billpayment)}}"
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