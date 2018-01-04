<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{$vinvoice->invoice_no}}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .table-borderless > tbody > tr > td,
        .table-borderless > tbody > tr > th,
        .table-borderless > tfoot > tr > td,
        .table-borderless > tfoot > tr > th,
        .table-borderless > thead > tr > td,
        .table-borderless > thead > tr > th {
            border: none;
        }
        /* Create two equal columns that floats next to each other */
        .column1 {
            float: left;
            width: 20%;
            margin-right: 0px; 
        }

        .column2 {
            float: right;
            width: 80%;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
    <div class = "container">
        <div class="row">
            <div class="column1">
                <div>
                    <img src="{{url('/images/logo.jpg')}}" alt="Innovi Logo" width="100" />
                </div>
                <div class="address" style="margin-top:30px">
                    <p><font size="-10">Rupayan Kamaruddin Tower(Level 3)
                    Plot B/A-20, Holding 8/A
                    D.I.T Road Malibagh Chowdhury Para
                    Dhaka-1219, Bangladesh</font></p>
                </div>
                <div class="helpline" style="margin-top: 30px ">
                    <p><font size="-10"><b>Hotline:</b><br>
                    +8801670555774<br>
                    <b>Email:</b><br>
                    support@innovi.com.bd<br>
                    <b>Website:</b><br>
                    www.innovi.com.bd</font></p>
                </div>
            </div>
            <div class="column2">   
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="clearfix">
                            <span class="panel-title">Invoice #{{$vinvoice->invoice_no}}</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-borderless" style="table-layout: fixed;width: 100%;">
                            <thead>
                                <tr style="text-align: left;">
                                    <th>Client</th>
                                    <th>Title</th>
                                    <th>Grand Total</th>
                                </tr>
                            </thead>
                            <tbody>            
                                <tr>
                                    <td>{{$vinvoice->client}}</td>
                                    <td>{{$vinvoice->title}}</td>
                                    <td>{{$vinvoice->grand_total}} BDT.</td>
                                </tr>
                            </tbody>
                            <thead style="margin-top: 10px;">
                                <tr style="text-align: left;">
                                    <th>Client Address</th>
                                    <th>Invoice Date</th>
                                    <th>Due Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$vinvoice->client_address}}</td>
                                    <td>{{$vinvoice->invoice_date}}</td>
                                    <td>{{$vinvoice->due_date}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <table class="table table-bordered table-striped">
                            <thead class="alert alert-info">
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
                                    <td class="table-amount"><b>{{$vinvoice->sub_total }} BDT.</b></td>
                                </tr>
                                <tr>
                                    <td class="table-empty" colspan="2"></td>
                                    <td class="table-label"><b>Advance / Installments</b></td>
                                    <td class="table-amount"><b>{{$vinvoice->advance}} BDT.</b></td>
                                </tr>
                                <tr>
                                    <td class="table-empty" colspan="2"></td>
                                    <td class="table-label col-md-1"><b>Discount</b></td>
                                    <td class="table-amount"><b>{{$vinvoice->discount}} BDT.</b></td>
                                </tr>
                                <tr>
                                    <td class="table-empty" colspan="2"></td>
                                    <td class="table-label col-md-6"><b><font color="red">Grand Total</font></b></td>
                                    <td class="table-amount"><b><font color="red">{{$vinvoice->grand_total}} BDT.</font></b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>