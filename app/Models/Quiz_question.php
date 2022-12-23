<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Quiz_question extends Model
{
    public function question_options(){
		return $this->hasMany(Quiz_question_option::class,'q_id','q_id')->with('question_options_attempt');
	}
	
	public function attempt_question(){
		$result=DB::table('quiz_result')->where('status','!=','I')->where('user_id',Session::get('user')['id'])->where('topic_id',request()->topic_id)->first();
		$result_id=$result->id??'0';
		return $this->hasMany(Quiz_question_answer::class,'q_id','q_id')->where('result_id',$result_id);
	}
}


