<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class CheckWeekAccess
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
		$id=$request->week_id;
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
