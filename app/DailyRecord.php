<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyRecord extends Model
{
    protected $fillable = [
        'invoice_no', 'title', 'amount', 'info'
    ];
}
