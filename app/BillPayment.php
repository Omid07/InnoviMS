<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillPayment extends Model
{
    protected $fillable = [
        'invoice_no', 'title', 'amount', 'info', 'type'
    ];
}
