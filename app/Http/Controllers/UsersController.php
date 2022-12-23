<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
	//

	public function view_users(Request $request)
	{

		if (isset($request->role)) {
			//dd($request->role);
			if ($request->role == "teachers") {
				$role = 2;
			} elseif ($request->role == "students") {
				$role = 3;
			}
			$users = DB::table('users')->where('role_type', '!=', 1)->where('status', '=', 'A')->where('role_type', '=', $role)->get();
		} else {
			$users = DB::table('users')->where('role_type', '!=', 1)->where('status', '=', 'A')->get();
		}
		//dd($users);
		return view('admin.users', ['users' => $users]);
	}

	public function delete_user(Request $request)
	{
		$result = DB::table('users')->where('id', $request->id)->update(
			array(
				'status' => 'D',
			)
		);
		return back();
	}

	public function add_user()
	{
		return view('admin.add_users');
	}

	public function doadduser(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
			'password' => 'required|min:6',
			'email' => 'unique:users|email',
			'role' => 'required',
		], [
			'role.required' => "The role is required."
		]);
		if ($validator->fails()) {
			//return redirect('/admin/add_student')->withErrors($validator)->withInput();
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
			$role = '';
			if ($validator->errors()->has('role')) {
				$role = $validator->errors()->first('role');
			}
			return response()->json(['error' => $validator->errors()->all(), 'error_name' => $name, 'error_password' => $password, 'error_email' => $email, 'error_role' => $role]);
		} else {
			$user = new User();
			$user->name = $request->get('name');
			$user->status = 'A';
			$user->email = $request->get('email');
			$user->role_type = $request->get('role');
			$user->password = Hash::make($request->get('password'));
			$user->remember_token = $request->get('_token');
			if ($user->save()) {
				$msg = "New User Added";
			} else {
				$msg = "New User not Added";
			}
			Session::flash('msg', $msg);
			return response()->json(['success' => $msg]);
		}
	}

	public function edit_users(Request $request)
	{
		$user = DB::table('users')->where('id', $request->id)->first();
		return view('admin.edit_user', ['user' => $user]);
	}


	public function doedituser(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
			'status' => 'required',
			'email' => 'unique:users,email,' . $request->id . '|email',
			'role' => 'required',
		], [
			'role.required' => "The role is required.",
			'status.required' => "The status is required."
		]);
		if ($validator->fails()) {
			//return redirect('/admin/add_student')->withErrors($validator)->withInput();
			$name = '';
			if ($validator->errors()->has('name')) {
				$name = $validator->errors()->first('name');
			}
			$status = '';
			if ($validator->errors()->has('status')) {
				$status = $validator->errors()->first('status');
			}
			$email = '';
			if ($validator->errors()->has('email')) {
				$email = $validator->errors()->first('email');
			}
			$role = '';
			if ($validator->errors()->has('role')) {
				$role = $validator->errors()->first('role');
			}
			return response()->json(['error' => $validator->errors()->all(), 'error_name' => $name, 'error_status' => $status, 'error_email' => $email, 'error_role' => $role]);
		} else {
			$affected = DB::table('users')->where('id', $request->id)->update(
				[
					'name' => $request->get('name'),
					'status' => $request->get('status'),
					'email' => $request->get('email'),
					'role_type' => $request->get('role'),
				]
			);
			$msg = "User Updated";
			Session::flash('msg', $msg);
			return response()->json(['success' => $msg]);
		}
	}


	public function pending_users()
	{
		$users = DB::table('users')->where('status', '=', 'I')->where('role_type', '!=', 1)->get();
		//dd($users);
		return view('admin.pending_users', ['users' => $users]);
	}


	public function approve_reject_user(Request $request)
	{
		$users = DB::table('users')->where('id', '=', $request->id)->update(
			['status' => $request->status],
		);
		if ($request->status == "A") {
			$msg = "User Approved";
		} else {
			$msg = "User Rejected";
		}
		Session::flash('msg', $msg);
		return back();
	}
}
