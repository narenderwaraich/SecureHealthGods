<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriberPlan extends Model
{
    protected $fillable = ['name','price','subscriber','day'];
}
