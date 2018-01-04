@extends('layouts.app')
@section('content')
	<center><h2>Records of Bill Payment</h2></center>
	<center><p>bla bla bla asdasd asdasdas asdasda asdsad</p></center>
	<br/>
	<div class="container">
		<a href="{{route('billpayments.create')}}" class="btn btn-success pull-right">Create</a>
		@if($billpayments->count())
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Invoice #</th>
						<th>Title</th>
						<th>Amount</th>
						<th>Type</th>
						<th>Information</th>
						<th>Created At</th>
                        <th>Updated At</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($billpayments as $billpayment)
					<tr>
						<td>{!! $billpayment->invoice_no !!}</td>
						<td>{{ $billpayment->title }}</td>
						<td>{!! $billpayment->amount !!}</td>
						<td>{{ $billpayment->type }}</td>
						<td>{{ str_limit($billpayment->info, 6, '....') }}</td>
						<td>{{ $billpayment->created_at->diffForHumans() }}</td>
                        <td>{{ $billpayment->updated_at->diffForHumans() }}</td>
                        <td class="text-right">
                            <a href="{{route('billpayments.show', $billpayment)}}" class="btn btn-default btn-sm">View</a>
                            <a href="{{route('billpayments.edit', $billpayment)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form class="form-inline" method="post"
                                action="{{route('billpayments.destroy', $billpayment)}}"
                                onsubmit="return confirm('Are you sure?')"
                            >
                                <input type="hidden" name="_method" value="delete">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                        </td>
					</tr>
					 @endforeach
				</tbody>
			</table>
			{!! $billpayments->render() !!}
	    @else
            <div class="invoice-empty">
                <p class="invoice-empty-title">
                    No Records were created.
                    <a href="{{route('billpayments.create')}}">Create Now!</a>
                </p>
            </div>
        @endif
	</div>
@endsection