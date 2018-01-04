<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{$vinvoice->invoice_no}}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .row-border > th,
        .row-border > td {
            border-top: 1px solid black;
            padding: 8px;
            line-height: 1.42;
            vertical-align: top;
        }
        .row-border:last-child > td {
            border-bottom: 1px solid black;
        }
        .invoice-data > tfoot th,
        .invoice-data > tfoot td {
            padding: 8px;
            line-height: 1.42;
            vertical-align: top;
        }
        .footer-border {
            border-bottom: 1px solid black;
        }
    </style>
</head>
<body>

<div class="container">
    <table class="table invoice-info" style="table-layout: fixed;width: 100%;">
        <caption>Invoice</caption>
        <thead>
            <tr style="text-align: left;">
                <th>Invoice No.</th>
                <th>Client</th>
                <th>Title</th>
            </tr>
        </thead>
        <tbody>            
            <tr>
                <td>{{$vinvoice->invoice_no}}</td>
                <td>${{$vinvoice->grand_total}}</td>
                <td>{{$vinvoice->title}}</td>
            </tr>
        </tbody>
        <thead style="margin-top: 10px;">
            <tr style="text-align: left;">
                <th>Grand Total</th>
                <th>Client Address</th>
                <th>Invoice Date</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>${{$vinvoice->grand_total}}</td>
                <td>{{$vinvoice->client_address}}</td>
                <td>{{$vinvoice->invoice_date}}</td>
                <td>{{$vinvoice->due_date}}</td>
            </tr>
        </tbody>
    </table>

    <table class="table table-bordered invoice-data" style="margin-top: 20px;table-layout: fixed;width: 100%;position: relative;">
        <thead>
            <tr>
                <th colspan="3" style="text-align: left">Product Name</th>
                <th colspan="2" style="text-align: left">Price</th>
                <th style="text-align: left">Qty</th>
                <th colspan="2" style="text-align: right">Total</th>
            </tr>
        </thead>
        <tbody style="border-bottom: 1px solid #000;">
            @foreach($vinvoice->items as $item)
                <tr class="row-border">
                    <td colspan="3" style="text-align: left">{{$item->name}}</td>
                    <td colspan="2" style="text-align: left">${{$item->price}}</td>
                    <td style="text-align: left">{{$item->qty}}</td>
                    <td colspan="2" style="text-align: right">${{$item->qty * $item->price}}.00</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot style="">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="footer-border" colspan="2">Sub Total</td>
                <td class="footer-border" style="text-align: right;">${{$vinvoice->sub_total}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="footer-border" colspan="2">Advance</td>
                <td class="footer-border" style="text-align: right;">${{$vinvoice->advance}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="footer-border" colspan="2">Discount</td>
                <td class="footer-border" style="text-align: right;">${{$vinvoice->discount}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="footer-border" colspan="2">Grand Total</td>
                <td class="footer-border" style="text-align: right;border-top: 1px solid #000;">${{$vinvoice->grand_total}}</td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- <div class = "container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="clearfix">
                <span class="panel-title">Invoice</span>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Invoice No.</label>
                        <p>{{$vinvoice->invoice_no}}</p>
                    </div>
                    <div class="form-group">
                        <label>Grand Total</label>
                        <p>${{$vinvoice->grand_total}}</p>
                    </div>
                </div>
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
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Invoice Date</label>
                            <p>{{$vinvoice->invoice_date}}</p>
                        </div>
                        <div class="col-sm-6">
                            <label>Due Date</label>
                            <p>{{$vinvoice->due_date}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Invoice No.</th>
                        <th>Grand Total</th>
                        <th>Client</th>
                        <th>Client Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-name">{{$vinvoice->invoice_no}}</td>
                        <td class="table-price">${{$vinvoice->grand_total}}</td>
                        <td class="table-qty">{{$vinvoice->client}}</td>
                        <td class="table-total text-right">{{$vinvoice->client_address}}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vinvoice->items as $item)
                        <tr>
                            <td class="table-name">{{$item->name}}</td>
                            <td class="table-price">${{$item->price}}</td>
                            <td class="table-qty">{{$item->qty}}</td>
                            <td class="table-total text-right">${{$item->qty * $item->price}}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Sub Total</td>
                        <td class="table-amount">${{$vinvoice->sub_total}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Advance</td>
                        <td class="table-amount">${{$vinvoice->advance}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Discount</td>
                        <td class="table-amount">${{$vinvoice->discount}}</td>
                    </tr>
                    <tr>
                        <td class="table-empty" colspan="2"></td>
                        <td class="table-label">Grand Total</td>
                        <td class="table-amount">${{$vinvoice->grand_total}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div> -->
</body>
</html>