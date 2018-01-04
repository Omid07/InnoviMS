@extends('layouts.app')

@section('content')
<div class = "container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <div class="col-sm-3">
                    <span class="panel-title pull-left">Invoice #{{$vinvoice->invoice_no}}</span>
                </div>
                <div class="col-sm-3">
                    <label>Work Status</label>
                    <p>{{$vinvoice->work_status}}</p>
                </div>
                <div class="col-sm-3">
                    <label>Bill Status</label>
                    <p>{{$vinvoice->bill_status}}</p>
                </div>
                <div class="pull-right">
                    <a href="/vinvoicepdf/{{ $vinvoice->id }}" class="btn btn-success">PDF</a>
                    <a href="{{route('vinvoices.index')}}" class="btn btn-default">Back</a>
                    <a href="{{route('vinvoices.edit', $vinvoice)}}" class="btn btn-primary">Edit</a>
                    <form class="form-inline" method="post"
                        action="{{route('vinvoices.destroy', $vinvoice)}}"
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
                        <p>{{$vinvoice->client}}</p>
                    </div>
                    <div class="form-group">
                        <label>Client Address</label>
                        <pre class="pre">{{$vinvoice->client_address}}</pre>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Title</label>
                        <p>{{$vinvoice->title}}</p>
                    </div>
                    <div class="form-group">
                        <label>Invoice Date</label>
                        <p>{{$vinvoice->invoice_date}}</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Grand Total</label>
                        <p>{{$vinvoice->grand_total}} BDT.</p>
                    </div>
                    <div class="form-group">
                        <label>Due Date</label>
                        <p>{{$vinvoice->due_date}}</p>
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
                    @foreach($vinvoice->items as $item)
                        <tr>
                            <td class="table-name">{{$item->name}}</td>
                            <td class="table-label table-price">{{$item->price}} BDT.</td>
                            <td class="table-label table-qty">{{$item->qty}}</td>
                            <td class="table-label table-total text-right">{{$item->qty * $item->price}} BDT.</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label"><b>Sub Total</b></td>
                        <td class="table-amount"><b>{{$vinvoice->sub_total}} BDT.</b></td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label"><b>Advance</b></td>
                        <td class="table-amount"><b>{{$vinvoice->advance}} BDT.</b></td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label"><b>Discount</b></td>
                        <td class="table-amount"><b>{{$vinvoice->discount}} BDT.</b></td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label"><b><font color="red">Grand Total</font></b></td>
                        <td class="table-amount"><b><font color="red">{{$vinvoice->grand_total}} BDT.</font></b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>    
@endsection