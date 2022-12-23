<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class CheckCourseAccess
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
		$id=$request->id;
		if(Session::has('user') && Session::get('user')['role_type']==2){
			//dd($id);
			$courses=DB::table('teachers_courses')->where('user_id',Session::get('user')['id'])->where('course_id',$id)->where('status',1)->first();
			if($courses){
				return $next($request);
			}
			else{
				return redirect()->back();
			}
		}
		else if(Session::has('user') && Session::get('user')['role_type']==3){
			$id=$request->course_id;
			$courses=DB::table('students_courses')->where('user_id',Session::get('user')['id'])->where('course_id',$id)->where('status',1)->first();
			if($courses){
				return $next($request);
			}
			else{
				return redirect()->back();
			}
		}
    }
}
