<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use DB;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Mail;


class AuthController extends Controller
{
	function login(Request $request)
	{
		if ($request->email == '' || $request->password == '') {
			Session::flash('message', "Please enter Email and Password");
			return redirect('/login');
		}
		if (Auth::attempt(array(
			'email' => $request->get('email'),
			'password' => $request->get('password')
		))) {
			$user['id'] = Auth::user()->id;
			$user['name'] = Auth::user()->name;
			$user['email'] = Auth::user()->email;
			$user['role_type'] = Auth::user()->role_type;
			Session::put('user', $user);
			if (Auth::user()->role_type == 3) {
				return redirect('/');
			}
			if (Auth::user()->role_type == 2) {
				return redirect('teacher/home');
			}
		}
		Session::flash('message', "Invalid Login , Please try again.");
		return redirect('/login');
	}

	function register(Request $request)
	{


		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
			'password' => 'required|min:6',
			'email' => 'unique:users|email',
			'confirm_password' => 'same:password'
		]);
		if ($validator->fails()) {
			$name = '';
			if ($validator->errors()->has('name')) {
				$name = $validator->errors()->first('name');
			}
			$password = '';
			if ($validator->errors()->has('password')) {
				$password = $validator->errors()->first('password');
			}
			$email = '';
			if ($validator->errors()->has('email')) {
				$email = $validator->errors()->first('email');
			}
			$confirm_password = '';
			if ($validator->errors()->has('confirm_password')) {
				$confirm_password = $validator->errors()->first('confirm_password');
			}
			return response()->json(['error' => $validator->errors()->all(), 'error_name' => $name, 'error_password' => $password, 'error_email' => $email, 'error_confirm_password' => $confirm_password]);
		} else {
			$user = new User();
			$user->name = $request->get('name');
			$user->email = $request->get('email');
			$user->password = Hash::make($request->get('password'));
			$user->remember_token = $request->get('_token');
			// if ($user->save()) {
			// 	$msg = "Registration Successfully";
			// } 
			if ($user->save()) {
				if (Auth::attempt(array(
					'email' => $request->get('email'),
					'password' => $request->get('password')
				))) {
					$user['id'] = Auth::user()->id;
					$user['name'] = Auth::user()->name;
					$user['email'] = Auth::user()->email;
					$user['role_type'] = Auth::user()->role_type;
					Session::put('user', $user);
					if (Auth::user()->role_type == 3) {
						return redirect('/');
					}
				}
				// $msg = "Registration Successfully";
				// $email = $request->get('email');
				// $show = DB::table('users')->where('email', $email)->first();
				// $user['id'] = $show->id;
				// $user['name'] = $show->name;
				// $user['email'] = $show->email;
				// $user['role_type'] = $show->role_type;
				// Session::put('user', $user);
				// if ($show->role_type == 3) {
				// 	echo 'done';
				// }
				// exit;
			}
		}
	}

	public function logout()
	{
		Session::flush();
		Auth::logout();
		return redirect('/');
	}

	public function admin_login(Request $request)
	{
		if ($request->email == '' || $request->password == '') {
			Session::flash('message', "Please enter Email and Password");
			return redirect('/admin');
		}
		if (Auth::attempt(array(
			'email' => $request->get('email'),
			'password' => $request->get('password')
		))) {
			$user['id'] = Auth::user()->id;
			$user['name'] = Auth::user()->name;
			$user['email'] = Auth::user()->email;
			$user['role_type'] = Auth::user()->role_type;
			Session::put('user', $user);
			if (Auth::user()->role_type == 1) {
				return redirect('admin/home');
			}
		}
		Session::flash('message', "Invalid Login , Please try again.");
		return redirect('/admin');
	}

	public function admin_logout()
	{
		Session::flush();
		Auth::logout();
		return Redirect('/admin');
	}
}
