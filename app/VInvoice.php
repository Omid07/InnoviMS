<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InvoiceProduct;

class VInvoice extends Model
{
    protected $fillable = [
        'invoice_no', 'invoice_date', 'due_date',
        'title', 'sub_total', 'discount', 'advance',
        'grand_total', 'client',
        'client_address', 'work_status', 'bill_status'
    ];
    public function items()
	{
		return $this->hasMany(VendorProduct::class);
	}
}
