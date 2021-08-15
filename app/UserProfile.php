<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProfile extends Model
{
    protected $fillable = ['phone_no','gender','date_of_birth','logo','address','country','state','city','zipcode','user_id'];
}
