@extends('layouts.app')
@section('content')
	<center><h2>Clients of Innovi</h2></center>
	<center><p>bla bla bla asdasd asdasdas asdasda asdsad</p></center>
	<br/>
	<div class="container">
		<a href="{{route('clients.create')}}" class="btn btn-success pull-right">Create</a>
		@if($clients->count())
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Name</th>
						<th>Type</th>
						<th>Information</th>
						<th>Created At</th>
                        <th>Updated At</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($clients as $client)
					<tr>
						<td>{{ $client->name }}</td>
						<td>{{ $client->type }}</td>
						<td>{{ str_limit($client->info, 6, '....') }}</td>
						<td>{{ $client->created_at->diffForHumans() }}</td>
                        <td>{{ $client->updated_at->diffForHumans() }}</td>
                        <td class="text-right">
                            <a href="{{route('clients.show', $client)}}" class="btn btn-default btn-sm">View</a>
                            <a href="{{route('clients.edit', $client)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form class="form-inline" method="post"
                                action="{{route('clients.destroy', $client)}}"
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
			{!! $clients->render() !!}
	    @else
            <div class="invoice-empty">
                <p class="invoice-empty-title">
                    No Records were created.
                    <a href="{{route('clients.create')}}">Create Now!</a>
                </p>
            </div>
        @endif
	</div>
@endsection