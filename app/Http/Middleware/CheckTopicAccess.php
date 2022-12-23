<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class CheckTopicAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		
		$topic_id=$request->topic_id;
		$topic=DB::table('topics')->where('id',$topic_id)->first();
		
		if($request->is('teacher/view_courses/edit_topic/*')){
			if($topic->status=="A" || $topic->status=="UA"){
				return redirect()->back();
			}
		}
		
		if($topic){
			$id=$topic->week_id;
		}
		else{
			return redirect()->back();
		}
		
		$course=DB::table('courses_weeks')->where('id',$id)->where('status',1)->first();
		//dd($course);
		if($course){
			$course_id=$course->course_id;
		}
		else{
			return redirect()->back();
		}
		
		if(Session::has('user') && Session::get('user')['role_type']==2){
			//dd($id);
			$courses=DB::table('teachers_courses')->where('user_id',Session::get('user')['id'])->where('course_id',$course_id)->where('status',1)->first();
			if($courses){
				return $next($request);
			}
			else{
				return redirect()->back();
			}
		}
		
       
    }
}
