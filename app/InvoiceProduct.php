<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\VInvoice;

class InvoiceProduct extends Model
{
    protected $fillable = [
        'name', 'price', 'qty', 'total'
    ];
    public function invoice()
    {
    	return $this->belongsTo(invoice::class);
    }
    // public function vinvoice()
    // {
    // 	return $this->belongsTo(VInvoice::class);
    // }
}
