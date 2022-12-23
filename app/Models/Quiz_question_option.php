<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Quiz_question_option extends Model
{
    public function quiz_questions()
    {
        return $this->belongsTo(Quiz_question::class);
		
    }
	
	public function question_options_attempt(){
		$result=DB::table('quiz_result')->where('status','!=','I')->where('user_id',Session::get('user')['id'])->where('topic_id',request()->topic_id)->first();
		$result_id=$result->id??'0';
		return $this->hasOne(Quiz_sub_question_answer::class,'sub_q_id','o_id')->where('result_id',$result_id);
	}
}
