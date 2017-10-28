@extends('layouts.app')
@section('content')
	<div class="container">
<!-- 		<center><h2>Clients OF Innovi</h2></center>
		<center><p>bla bla bla asdasd asdasdas asdasda asdsad</p></center>
		<table class="table table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>

			</tr>
		</thead>
		<tbody>
			@foreach ($clients as $client)
				<tr>
					<td>{!! $client->id !!}</td>
					<td>{{ $client->name }}</td>
				</tr>      
			 @endforeach
		</tbody>
		</table> -->

		<center><h2>Clients Of Innovi</h2></center>
		<center><p>bla bla bla asdasd asdasdas asdasda asdsad</p></center>
		<div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-primary">
	                <div class="panel-body">
	                    <ul class="chat">
							<table class="table table-hover">
								<thead>
									<tr>
										<th><center>ID</center></th>
										<th><center>Name</center></th>
										<th><center>Information</center></th>
										<th><center>Action</center></th>
									</tr>
								</thead>
								<tbody>
									@foreach ($clients as $client)
										<tr>
											<td><center>{!! $client->id !!}</center></td>
											<td><center>{{ $client->name }}</center></td>
											<td><center>{{ $client->info }}</center></td>
											<td>
												<center>
												{{ Form::open([ "url" => "/client/$client->id/edit", 'method' => 'post']) }}
													<button  type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
												{{ Form::close() }}
												{{ Form::open([ "url" => "/client/$client->id/delete", 'method' => 'delete']) }}
													<button class="btn btn-danger" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i>
													</button>
												{{ Form::close() }}
												</center>
											</td>
										</tr>      
									 @endforeach
								</tbody>
							</table>
	                    </ul>
	                </div>
	            </div>
	        </div>
    	</div>
	</div>
@endsection