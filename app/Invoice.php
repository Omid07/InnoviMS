<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_no', 'invoice_date', 'due_date',
        'title', 'sub_total', 'discount', 'advance',
        'grand_total', 'client',
        'client_address', 'bill_status', 'work_status'
    ];
    public function products()
	{
		return $this->hasMany(InvoiceProduct::class);
	}
    // public function items()
    // {
    //     return $this->hasMany(VendorBills::class);
    // }
}
