<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    protected $fillable = ['question_number','question','answer','type','category_id','A','B','C','D','ans_type','checkbox_ans_1','checkbox_ans_2','checkbox_ans_3','checkbox_ans_4','checkbox_ans_5','checkbox_ans_6','checkbox_1','checkbox_2','checkbox_3','checkbox_4','checkbox_5','checkbox_6','true_false_answer','write_ans','write_ans_data'];
}
