<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['member_code','logo','refer_code','pendant_no','name','email','phone','gender','date_of_birth','adhar_card_number','country','state','city','zipcode','address','user_id','is_activated'];
}
