<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    protected $fillable = [
        'name', 'price', 'qty', 'total'
    ];
    public function vinvoice()
    {
    	return $this->belongsTo(VInvoice::class);
    }
}
