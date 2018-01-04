@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div>
        <center><h3>On Going Projects</h3></center>
    </div>
    <hr>
    <br>
    @if($invoices->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Invoice No.</th>
                    <th>Client</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoices as $invoice)
                    <tr>
                        <td>{{$invoice->invoice_no}}</td>
                        <td>{{$invoice->client}}</td>
                        <td>{{$invoice->invoice_date}}</td>
                        <td>{{$invoice->due_date}}</td>
                        <td>{{$invoice->created_at->diffForHumans()}}</td>
                        <td>{{$invoice->updated_at->diffFOrHUmans()}}</td>
                        <td class="text-right">
                            <a href="{{route('invoices.show', $invoice)}}" class="btn btn-default btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="invoice-empty">
            <p class="invoice-empty-title">
                No work is going on !!!
            </p>
        </div>
    @endif
    <br>
    <div>
        <center><h3>Due Bills</h3></center>
    </div>
    <hr>
    <br>
    @if($dueinvoice->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Invoice No.</th>
                    <th>Client</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dueinvoice as $invoice)
                    <tr>
                        <td>{{$invoice->invoice_no}}</td>
                        <td>{{$invoice->client}}</td>
                        <td>{{$invoice->invoice_date}}</td>
                        <td>{{$invoice->due_date}}</td>
                        <td>{{$invoice->created_at->diffForHumans()}}</td>
                        <td>{{$invoice->updated_at->diffFOrHUmans()}}</td>
                        <td class="text-right">
                            <a href="{{route('invoices.show', $invoice)}}" class="btn btn-default btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="invoice-empty">
            <p class="invoice-empty-title">
                There is no due Bills !!!
            </p>
        </div>
    @endif
    <br>
        <div>
        <center><h3>To Be Paid Bills</h3></center>
    </div>
    <hr>
    <br>
    @if($tobepaid->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Invoice No.</th>
                    <th>Client</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tobepaid as $invoice)
                    <tr>
                        <td>{{$invoice->invoice_no}}</td>
                        <td>{{$invoice->client}}</td>
                        <td>{{$invoice->invoice_date}}</td>
                        <td>{{$invoice->due_date}}</td>
                        <td>{{$invoice->created_at->diffForHumans()}}</td>
                        <td>{{$invoice->updated_at->diffFOrHUmans()}}</td>
                        <td class="text-right">
                            <a href="{{route('invoices.show', $invoice)}}" class="btn btn-default btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="invoice-empty">
            <p class="invoice-empty-title">
                There is no To Be Paid Bills !!!
            </p>
        </div>
    @endif
</div>
@endsection
