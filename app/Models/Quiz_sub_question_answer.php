<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz_sub_question_answer extends Model
{
    public $table = "quiz_sub_question_answer";
	
    /*public function sub_question_options(){
		return $this->hasMany(Quiz_question_option::class,'q_id','q_id');
	}*/

}
