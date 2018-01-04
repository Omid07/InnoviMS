@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <span class="panel-title">Vendor Bills</span>
                @if(is_null($id))
                <a href="{{route('vinvoices.create')}}" class="btn btn-success pull-right">Create</a>
                @else                
                {{ Form::open([ "url" => "/vinvoice/create/$id", 'method' => 'get']) }}
                    <button  type="submit" class="btn btn-success pull-right">Create</button>
                {{ Form::close() }}

                @endif
            </div>
        </div>
        <div class="panel-body">
            @if($vinvoices->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Invoice No.</th>
                        <th>Grand Total</th>
                        <th>Client</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>
                        <th colspan="2">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vinvoices as $vinvoice)
                        <tr>
                            <td>{{$vinvoice->invoice_no}}</td>
                            <td>${{$vinvoice->grand_total}}</td>
                            <td>{{$vinvoice->client}}</td>
                            <td>{{$vinvoice->invoice_date}}</td>
                            <td>{{$vinvoice->due_date}}</td>
                            <td>{{$vinvoice->created_at->diffForHumans()}}</td>
                            <td class="text-right">
                                <a href="{{route('vinvoices.show', $vinvoice)}}" class="btn btn-default btn-sm">View</a>
                                <a href="{{route('vinvoices.edit', $vinvoice)}}" class="btn btn-primary btn-sm">Edit</a>
                                <form class="form-inline" method="post"
                                    action="{{route('vinvoices.destroy', $vinvoice)}}"
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
            {!! $vinvoices->render() !!}
            @else
                <div class="invoice-empty">
                    <p class="invoice-empty-title">
                        No Invoices were created.
                        <a href="{{route('vinvoices.create')}}">Create Now!</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>    
@endsection