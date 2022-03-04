<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $fillable = ['question_number','question','answer','type','category_id','A','B','C','D'];
}
