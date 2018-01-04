<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
	protected $fillable = [
        'invoice_no', 'name', 'amount', 'info'
    ];
}
