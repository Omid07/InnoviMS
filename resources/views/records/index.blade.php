@extends('layouts.app')
@section('content')
	<center><h2>Daily Records Of Innovi</h2></center>
	<center><p>bla bla bla asdasd asdasdas asdasda asdsad</p></center>
	<br/>
	<div class="container">
		<a href="{{route('records.create')}}" class="btn btn-success pull-right">Create</a>
		@if($records->count())
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Invoice #</th>
						<th>Title</th>
						<th>Amount</th>
						<th>Information</th>
						<th>Created At</th>
                        <th>Updated At</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($records as $record)
					<tr>
						<td>{!! $record->invoice_no !!}</td>
						<td>{{ $record->title }}</td>
						<td>{!! $record->amount !!}</td>
						<td>{{ str_limit($record->info, 6, '....') }}</td>
						<td>{{$record->created_at->diffForHumans()}}</td>
                        <td>{{$record->updated_at->diffForHumans()}}</td>
                        <td class="text-right">
                            <a href="{{route('records.show', $record)}}" class="btn btn-default btn-sm">View</a>
                            <a href="{{route('records.edit', $record)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form class="form-inline" method="post"
                                action="{{route('records.destroy', $record)}}"
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
			{!! $records->render() !!}
	    @else
            <div class="invoice-empty">
                <p class="invoice-empty-title">
                    No Records were created.
                    <a href="{{route('records.create')}}">Create Now!</a>
                </p>
            </div>
        @endif
	</div>
@endsection