<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Quiz_result extends Model
{
    public function question_options(){
		return $this->hasMany(Quiz_question_option::class,'q_id','q_id');
	}
}
