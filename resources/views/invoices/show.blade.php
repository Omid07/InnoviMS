@extends('layouts.app')

@section('content')
<div class = "container">
    <div>
        {{ Form::open([ "url" => "/vendorbills/$invoice->invoice_no", 'method' => 'get']) }}
        <button  type="submit" class="btn btn-success">Vendor Bill</button>
        {{ Form::close() }}
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <div class="col-sm-3 pull-left">
                    <span class="panel-title pull-left">Invoice #{{$invoice->invoice_no}}</span>
                </div>
                <div class="col-sm-3">
                    <label>Work Status</label>
                    <p>{{$invoice->work_status}}</p>
                </div>
                <div class="col-sm-3">
                    <label>Bill Status</label>
                    <p>{{$invoice->bill_status}}</p>
                </div>
                <div class="pull-right">
                    <a href="/invoicepdf/{{ $invoice->id }}" class="btn btn-success">PDF</a>
                    <a href="{{route('invoices.index')}}" class="btn btn-default">Back</a>
                    <a href="{{route('invoices.edit', $invoice)}}" class="btn btn-primary">Edit</a>
                    <form class="form-inline" method="post"
                        action="{{route('invoices.destroy', $invoice)}}"
                        onsubmit="return confirm('Are you sure?')"
                    >
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Client</label>
                        <p>{{$invoice->client}}</p>
                    </div>
                    <div class="form-group">
                        <label>Client Address</label>
                        <pre class="pre">{{$invoice->client_address}}</pre>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Title</label>
                        <p>{{$invoice->title}}</p>
                    </div>
                    <div class="form-group">
                        <label>Invoice Date</label>
                        <p>{{$invoice->invoice_date}}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Grand Total</label>
                        <p>{{$invoice->grand_total}} BDT.</p>
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <p>{{$invoice->due_date}}</p>
                    </div>
                </div>
            </div>
            <hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th><p align="right">Price</p></th>
                        <th><p align="right">Quantity</p></th>
                        <th><p align="right">Total</p></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->products as $product)
                        <tr>
                            <td class="table-name">{{$product->name}}</td>
                            <td class="table-label table-price">{{$product->price}} BDT.</td>
                            <td class="table-label table-qty">{{$product->qty}}</td>
                            <td class="table-label table-total text-right">{{$product->qty * $product->price}} BDT.</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label"><b>Sub Total</b></td>
                        <td class="table-amount"><b>{{$invoice->sub_total}} BDT.</b></td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label"><b>Advance</b></td>
                        <td class="table-amount"><b>{{$invoice->advance}} BDT.</b></td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label"><b>Discount</b></td>
                        <td class="table-amount"><b>{{$invoice->discount}} BDT.</b></td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label"><b><font color="red">Grand Total</font></b></td>
                        <td class="table-amount"><b><font color="red">{{$invoice->grand_total}} BDT.</font></b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>    
@endsection