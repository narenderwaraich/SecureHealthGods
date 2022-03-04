<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class youtubeGet extends Model
{
    protected $fillable = ['name','email','phone_no','channel_name','channel_id','status','subscribers'];
}
