<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorBill extends Model
{
        protected $fillable = [
        'invoice_no', 'invoice_date', 'due_date',
        'title', 'sub_total', 'discount', 'advance',
        'grand_total', 'client',
        'client_address'
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
