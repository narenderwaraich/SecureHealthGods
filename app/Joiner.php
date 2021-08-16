<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joiner extends Model
{
    protected $fillable = ['logo','refer_code','pendant_no','name','email','phone','gender','date_of_birth','adhar_card_number','country','state','city','zipcode','address'];
}
