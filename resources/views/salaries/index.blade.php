@extends('layouts.app')
@section('content')
	<center><h2>Salaries information of Innovi</h2></center>
	<center><p>bla bla bla asdasd asdasdas asdasda asdsad</p></center>
	<br/>
	<div class="container">
		<a href="{{route('salaries.create')}}" class="btn btn-success pull-right">Create</a>
		@if($salaries->count())
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Invoice #</th>
						<th>Name</th>
						<th>Amount</th>
						<th>Information</th>
						<th>Created At</th>
                        <th>Updated At</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($salaries as $salary)
					<tr>
						<td>{!! $salary->invoice_no !!}</td>
						<td>{{ $salary->name }}</td>
						<td>{!! $salary->amount !!}</td>
						<td>{{ str_limit($salary->info, 6, '....') }}</td>
						<td>{{$salary->created_at->diffForHumans()}}</td>
                        <td>{{$salary->updated_at->diffForHumans()}}</td>
                        <td class="text-right">
                            <a href="{{route('salaries.show', $salary)}}" class="btn btn-default btn-sm">View</a>
                            <a href="{{route('salaries.edit', $salary)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form class="form-inline" method="post"
                                action="{{route('salaries.destroy', $salary)}}"
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
			{!! $salaries->render() !!}
	    @else
            <div class="invoice-empty">
                <p class="invoice-empty-title">
                    No Records were created.
                    <a href="{{route('salaries.create')}}">Create Now!</a>
                </p>
            </div>
        @endif
	</div>
@endsection