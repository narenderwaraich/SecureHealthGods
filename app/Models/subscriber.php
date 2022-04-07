<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{
    protected $fillable = ['user_id', 'address', 'country','state','city','zipcode','left_amount','total_amount','bank_name','account_no','ifsc_code','upi_id'];
}
