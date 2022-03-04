<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscribeApprovel extends Model
{
    protected $fillable = ['channel_id','status','screen_shot','user_id'];
}
