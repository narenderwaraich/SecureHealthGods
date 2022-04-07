<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $fillable = ['order_id','payment_method','amount','transaction_id','transaction_status','bank_transaction_id','transaction_date','bank_name'];
}
