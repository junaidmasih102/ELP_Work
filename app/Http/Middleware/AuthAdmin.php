<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthAdmin
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
		//dd(Session::has('user'));
		if(Session::has('user') && Session::get('user')['role_type']==1){		
			return $next($request);
		}
		elseif(Session::has('user') && (Session::get('user')['role_type']==2 || Session::get('user')['role_type']==3)){
			return redirect(url()->previous());
		}
        
		
		Session::flash( 'message', "Login First" );
		return redirect('/admin');
    }
}
