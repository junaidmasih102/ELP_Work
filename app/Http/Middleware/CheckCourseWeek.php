<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class CheckCourseWeek
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
			$week=$request->week;
			$week=str_replace("_"," ",$week);
			$course_id=$request->course_id;
			
			$weeks=DB::table('courses_weeks')->where('course_id',$course_id)->where('week_name',$week)->where('status',1)->first();
			
			if($weeks){
				return $next($request);
			}
			else{
				return redirect()->back();
			}
			
			
		
    }
}
