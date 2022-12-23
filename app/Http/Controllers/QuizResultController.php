<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class QuizResultController extends Controller
{
    public function quiz_result(){
		$courses=DB::table('courses')->where('status',1)->get();
		return view('admin.view_result_added_courses',['courses'=>$courses]);
	}
}
