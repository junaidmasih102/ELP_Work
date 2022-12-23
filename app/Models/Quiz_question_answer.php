<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz_question_answer extends Model
{
	public $table = "quiz_question_answer";
	
    public function question_options(){
		return $this->hasMany(Quiz_question_option::class,'q_id','q_id');
	}
}
