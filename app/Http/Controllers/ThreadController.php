<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Weekthread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;


class ThreadController extends Controller
{

	// public function __construct(Request $request)
	// {
	// 	$id = $request->thread_id;
	// 	$data = Weekthread::where('thread_id', $id)->where('status', 1)->get();
	// 	View::share('thread_sidebar', $data);
	// }

	public function get_discussion($thread_id)
	{
		$thread = DB::table('week_thread')->where('thread_id', '=', $thread_id)->where('status', '=', 1)->first();
		$discussion = DB::table('thread_msg')->where('thread_id', '=', $thread_id)->where('status', '=', 1)->where('reply_to', '=', null)->orderByDesc('post_time')->get();
		$count = count($discussion);
		return view('Thread.discussion', ['discussion' => $discussion, 'thread' => $thread, 'count' => $count]);
	}

	public function add_query(Request $req)
	{
		$req->validate([
			'msg' => 'required'
		]);
		DB::table('thread_msg')->insert([
			'thread_id' => $req->thread_id,
			'msg_by' => Session::get('user')['id'],
			'msg_text' => trim($req->msg),
			'status' => 1
		]);
		return back();
	}

	public function refresh_thread($thread_id)
	{
		$thread = DB::table('week_thread')->where('thread_id', '=', $thread_id)->where('status', '=', 1)->first();
		$discussion = DB::table('thread_msg')->where('thread_id', '=', $thread_id)->where('reply_to', '=', null)->where('status', '=', 1)->orderByDesc('post_time')->get();
		$count = count($discussion);
		return view('Thread.refresh', ['discussion' => $discussion, 'thread' => $thread, 'count' => $count]);
	}

	public function get_thread($msg_id)
	{
		$thread_id = DB::table('thread_msg')->where('msg_id', '=', $msg_id)->first();
		$replies = DB::table('thread_msg')->where('reply_to', '=', $msg_id)->where('status', '=', 1)->orderByDesc('post_time')->get();
		return view('Thread.thread', ['replies' => $replies, 'thread_id' => $thread_id]);
	}

	public function add_reply(Request $req)
	{
		$req->validate([
			'msg' => 'required'
		], [
			'msg.required' => 'The Query field is required.'
		]);
		DB::table('thread_msg')->insert([
			'thread_id' => $req->thread_id,
			'msg_by' => Session::get('user')['id'],
			'msg_text' => trim($req->msg),
			'reply_to' => $req->msg_id,
			'status' => 1
		]);
		return response()->json(['success' => 'Msg sent.']);
	}

	public function refresh_msg($msg_id)
	{
		$thread_id = DB::table('thread_msg')->where('msg_id', '=', $msg_id)->first();
		$replies = DB::table('thread_msg')->where('reply_to', '=', $msg_id)->where('status', '=', 1)->orderByDesc('post_time')->get();
		return view('Thread.threadrefresh', ['replies' => $replies, 'thread_id' => $thread_id]);
	}

	public function all_forums_teacher()
	{
		// $forums = DB::select("select * from teachers_courses WHERE user_id = ".Session::get('user')['id'].";");
		$forums = DB::table('teachers_courses')->select('courses.name as course_name', 'teachers_courses.user_id as user_id', 'courses.id as course_id')
			->join('courses', 'courses.id', '=', 'teachers_courses.course_id')
			->where('user_id', '=', Session::get('user')['id'])
			->get();
		return view('teacher.thread.forums', ['forums' => $forums]);
	}

	public function get_discussion_teacher($thread_id)
	{
		$thread = DB::table('week_thread')->where('thread_id', '=', $thread_id)->where('status', '=', 1)->first();
		$discussion = DB::table('thread_msg')->where('thread_id', '=', $thread_id)->where('status', '=', 1)->where('reply_to', '=', null)->orderByDesc('post_time')->get();
		$count = count($discussion);
		return view('teacher.thread.discussion', ['discussion' => $discussion, 'thread' => $thread, 'count' => $count]);
	}

	public function add_teacher_qurey(Request $req)
	{
		$req->validate([
			'msg' => 'required'
		]);
		DB::table('thread_msg')->insert([
			'thread_id' => $req->thread_id,
			'msg_by' => Session::get('user')['id'],
			'msg_text' => trim($req->msg),
			'status' => 1
		]);
		return back();
	}

	public function refresh_teacher_thread($thread_id)
	{
		$thread = DB::table('week_thread')->where('thread_id', '=', $thread_id)->where('status', '=', 1)->first();
		$discussion = DB::table('thread_msg')->where('thread_id', '=', $thread_id)->where('reply_to', '=', null)->where('status', '=', 1)->orderByDesc('post_time')->get();
		$count = count($discussion);
		return view('teacher.thread.refreshthread', ['discussion' => $discussion, 'thread' => $thread, 'count' => $count]);
	}

	public function get_teacher_msg($msg_id)
	{
		$thread_id = DB::table('thread_msg')->where('msg_id', '=', $msg_id)->first();
		$replies = DB::table('thread_msg')->where('reply_to', '=', $msg_id)->where('status', '=', 1)->orderByDesc('post_time')->get();
		return view('teacher.thread.replies', ['replies' => $replies, 'thread_id' => $thread_id]);
	}

	public function refresh_teacher_msg($msg_id)
	{
		$thread_id = DB::table('thread_msg')->where('msg_id', '=', $msg_id)->first();
		$replies = DB::table('thread_msg')->where('reply_to', '=', $msg_id)->where('status', '=', 1)->orderByDesc('post_time')->get();
		return view('teacher.thread.repliesrefresh', ['replies' => $replies, 'thread_id' => $thread_id]);
	}

	public function add_teacher_reply(Request $req)
	{
		$req->validate([
			'msg' => 'required'
		], [
			'msg.required' => 'The Query field is required.'
		]);
		DB::table('thread_msg')->insert([
			'thread_id' => $req->thread_id,
			'msg_by' => Session::get('user')['id'],
			'msg_text' => trim($req->msg),
			'reply_to' => $req->msg_id,
			'status' => 1
		]);
		return response()->json(['success' => 'Msg sent.']);
	}
}
