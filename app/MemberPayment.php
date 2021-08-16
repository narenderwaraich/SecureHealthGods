<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberPayment extends Model
{
    protected $fillable = ['order_id','payment_method','amount','transaction_id','transaction_status','bank_transaction_id','transaction_date','member_id'];
}
