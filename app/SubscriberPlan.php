<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriberPlan extends Model
{
    protected $fillable = ['name','price','subscriber','day'];
}
