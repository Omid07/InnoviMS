@extends('layouts.app')
@section('content')
	<div class="container">
	    <h1><strong>Client Details</strong> </h1>
	    <hr>
	    <h3><b>Name :</b> {{ $client->name }}</h3>
	    <h3><b>Type:</b> {{ $client->type }}</h3>
	    <h3><b>Information:</b> {!! nl2br(e($client->info)) !!}</h3>
	    <h3><b>Create date:</b> {{ $client->created_at->diffForHumans() }}</h3>
	    <h3><b>Update date:</b> {{ $client->updated_at->diffForHumans() }}</h3>
	    <hr>
	    <div class="text-center"">
            <a href="{{route('clients.edit', $client)}}" class="btn btn-primary btn-sm">Edit</a>
            <form class="form-inline" method="post"
                action="{{route('clients.destroy', $client)}}"
                onsubmit="return confirm('Are you sure?')"
            >
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            </form>
        </div>
	</div>
@endsection