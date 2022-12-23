<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topics;
// use DB;
use App\Models\Courses;
use App\Models\Topics_data;
use Illuminate\Http\Request;
use App\Models\Quiz_question;
use App\Models\Signatures;
use App\Models\Students_courses;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

	public function show_courses_to_student()
	{


	

		$courses = Courses::where('status', '=', 1)->with('students_courses')->take(2)->get();
	
		$courses_latest = Courses::where('status', '=', 1)->with('students_courses')->orderBy('id', 'DESC')->take(2)->get(); //with('students_courses_home')->orderBy('id', 'DESC')->take(2)->get();
		$all_courses = Courses::where('status', '=', 1)->with('students_courses')->get();
		if (auth()->user()) {
			$progress_courses = DB::table('students_courses')->join('courses', 'courses.id', '=', 'students_courses.course_id')->where('students_courses.user_id', Session::get('user')['id'])->where('students_courses.status', 1)->get();
			return view('home', compact('courses', 'courses_latest', 'all_courses', 'progress_courses'));
		}
		return view('home', compact('courses', 'courses_latest', 'all_courses'));
	}

	public function adminhome(Request $request)
	{
		if (isset($request->role)) {
			if ($request->role == "teachers") {
				$role = 2;
			} elseif ($request->role == "students") {
				$role = 3;
			}
			$users = DB::table('users')->where('role_type', '!=', 1)->where('status', '=', 'A')->where('role_type', '=', $role)->get();
		} else {
			$users = DB::table('users')->where('role_type', '!=', 1)->where('status', '=', 'A')->get();
		}
		return view('admin.home', compact('users'));
	}



	public function completecourse()
	{
		$progress_courses = DB::table('students_courses')->join('courses', 'courses.id', '=', 'students_courses.course_id')->where('students_courses.user_id', Session::get('user')['id'])->where('students_courses.status', 1)->get();
		$topics_seen = DB::table('topics_data_seen')->where(Session::get('user')['id'])->get();
		$quiz_result = DB::table('quiz_result')->where(Session::get('user')['id'])->get();
		$assessment_answers = DB::table('assessment_answers')->where(Session::get('user')['id'])->get();
		$assessment_feedback = DB::table('assessment_feedbacks')->where(Session::get('user')['id'])->get();
	}

	public function doaddcourse(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
			'summary' => 'required',
			'about_course' => 'required',
			'skills' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
		], [
			'image.required' => "The image is required."
		]);

		if ($validator->fails()) {
			//return redirect('/admin/add_student')->withErrors($validator)->withInput();
			$name = '';
			if ($validator->errors()->has('name')) {
				$name = $validator->errors()->first('name');
			}

			$summary = '';
			if ($validator->errors()->has('summary')) {
				$summary = $validator->errors()->first('summary');
			}

			$about_course = '';
			if ($validator->errors()->has('about_course')) {
				$about_course = $validator->errors()->first('about_course');
			}

			$skills = '';
			if ($validator->errors()->has('skills')) {
				$skills = $validator->errors()->first('skills');
			}

			$image = '';
			if ($validator->errors()->has('image')) {
				$image = $validator->errors()->first('image');
			}
			return response()->json(['error' => $validator->errors()->all(), 'error_name' => $name, 'error_summary' => $summary, 'error_about_course' => $about_course, 'error_skills' => $skills, 'error_image' => $image]);
		} else {
			$fileName = $request->image->getClientOriginalName();
			$extension = $request->image->extension();
			$withOutExtension = substr($fileName, 0, strrpos($fileName, "."));
			$image_name = $withOutExtension . "_" . time() . "." . $extension;
			$request->image->storeAs('/public', $image_name);
			$name = $request->name;
			$summary = $request->summary;
			$about_course = $request->about_course;
			$skills = $request->skills;
			$skills = trim($skills, ",");
			$result = DB::table('courses')->insert(
				['name' => $name, 'summary' => $summary, 'about_course' => $about_course, 'skills' => $skills, 'image' => $image_name]
			);
			Session::flash('msg', 'Added new Course.');
			return response()->json(['success' => 'Added new Course.']);
		}
	}


	public function view_added_courses()
	{
		$courses = DB::table('courses')->where('status', 1)->get();
		return view('admin.view_added_courses', compact('courses'));
	}


	public function delcource(Request $request)
	{
		$affected = DB::table('courses')->where('id', $request->id)->update(['status' => 2]);
		Session::flash('msg', 'Course Deleted.');
		return redirect('/admin/view_added_courses');
	}

	public function edit_course(Request $request, $id)
	{
		$course = DB::table('courses')->where('id', $id)->first();
		return view('admin.edit_course', ['course' => $course]);
	}

	public function doeditcourse(Request $request)
	{
		//return response()->json(['error'=>$request->all()]);
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
			'summary' => 'required',
			'about_course' => 'required',
			'skills' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
		]);
		if ($validator->fails()) {
			//return redirect('/admin/add_student')->withErrors($validator)->withInput();
			$name = '';
			if ($validator->errors()->has('name')) {
				$name = $validator->errors()->first('name');
			}
			$summary = '';
			if ($validator->errors()->has('summary')) {
				$summary = $validator->errors()->first('summary');
			}
			$about_course = '';
			if ($validator->errors()->has('about_course')) {
				$about_course = $validator->errors()->first('about_course');
			}
			$skills = '';
			if ($validator->errors()->has('skills')) {
				$skills = $validator->errors()->first('skills');
			}
			$image = '';
			if ($validator->errors()->has('image')) {
				$image = $validator->errors()->first('image');
			}
			return response()->json(['error' => $validator->errors()->all(), 'error_name' => $name, 'error_summary' => $summary, 'error_about_course' => $about_course, 'error_skills' => $skills, 'error_image' => $image]);
		} else {

			$name = $request->name;
			$summary = $request->summary;
			$about_course = $request->about_course;
			$skills = $request->skills;
			if ($request->image) {
				$fileName = $request->image->getClientOriginalName();
				$extension = $request->image->extension();
				$withOutExtension = substr($fileName, 0, strrpos($fileName, "."));
				$image_name = $withOutExtension . "_" . time() . "." . $extension;
				$request->image->storeAs('/public', $image_name);
				$data = ['name' => $name, 'summary' => $summary, 'about_course' => $about_course, 'skills' => $skills, 'image' => $image_name];
			} else {
				$data = ['name' => $name, 'summary' => $summary, 'about_course' => $about_course, 'skills' => $skills];
			}
			$skills = trim($skills, ",");
			$result = DB::table('courses')->where('id', $request->id)->update($data);
			Session::flash('msg', 'Course Updated.');
			return response()->json(['success' => 'Added new Course.']);
		}
	}

	public function apply_for_cource($id)
	{
		if (auth()->user()) {
			$data = DB::table('students_courses')->where('user_id', Session::get('user')['id'])->where('course_id', $id)->get();
			if (!count($data)) {
				DB::table('students_courses')->insert(['user_id' => Session::get('user')['id'], 'course_id' => $id]);
			}
			return redirect('/');
		} else {
			return redirect('/login');
		}
	}

	public function view_students_requests()
	{
		$requests = DB::table('students_courses')->where('students_courses.status', 0)->join('users', 'users.id', '=', 'students_courses.user_id')->join('courses', 'courses.id', '=', 'students_courses.course_id')->select('students_courses.id', 'courses.name as course', 'users.name as student')->get();
		return view('admin.view_students_requests', compact('requests'));
	}

	public function approve_reject_request_cource(Request $request)
	{

		$result = DB::table('students_courses')->where('id', '=', $request->id)->update(['status' => $request->status]);
		if ($request->status == 1) {
			$msg = 'Student Request Approved.';
		} else {
			$msg = 'Student Request Rejected.';
		}
		Session::flash('msg', $msg);
		return redirect('/admin/view_students_requests');
	}

	public function assign_courses_to_students()
	{
		$courses = DB::table('courses')->where('status', 1)->get();
		return view('admin.assign_courses_to_students', ['courses' => $courses]);
	}


	public function view_added_students($id)
	{
		$courses = DB::table('courses')->where('id', $id)->get();
		$students = DB::table('students_courses')->where('students_courses.status', 1)->where('students_courses.course_id', $id)->join('users', 'users.id', '=', 'students_courses.user_id')->select('students_courses.id', 'users.name as student', 'users.email')->get();
		return view('admin.view_added_students', compact('courses', 'students'));
	}

	public function remove_student_from_cource(Request $request)
	{
		$result = DB::table('students_courses')->where('id', '=', $request->id)->update(['status' => $request->status]);
		Session::flash('msg', 'Student Removed from this Cource.');
		return redirect()->back();
	}


	public function add_students_to_course($course_id)
	{
		//$students=DB::table('users')->leftJoin('students_courses','students_courses.user_id','=','users.id')->leftJoin('courses','courses.id','=','students_courses.course_id')->where( function ($query){ $query->where('students_courses.status','!=',1)->orWhere('students_courses.status','=',null ); } )->where( function ($query) use($cource_id) { $query->where('students _courses.course_id','=',$cource_id)->orWhere('students_courses.course_id','=',null); })->where('users.role_type',3)->get();
		//$students=User::join('students_courses','students_courses.user_id','=','users.id')->get();
		$students = DB::table('users')->where('role_type', 3)->select('users.id', 'users.name as student', 'users.email')->get();
		$students_courses = DB::table('students_courses')->where('course_id', $course_id)->get();
		$courses = DB::table('courses')->where('id', $course_id)->get();
		//dd($students_courses);
		return view('admin.add_students_to_course', compact('courses', 'students', 'course_id', 'students_courses'));
	}

	public function seleted_students_add_to_course(Request $request)
	{
		$selected_students = $request->selected_students;
		$course_id = $request->course_id;

		if (!$selected_students) {
			Session::flash('msg', 'Please Select Students');
			return redirect()->back();
		}

		foreach ($selected_students as $selected_student) {
			$students = DB::table('students_courses')->where('user_id', $selected_student)->where('course_id', $course_id)->first();
			if (!$students) {
				$result = DB::table('students_courses')->insert(['user_id' => $selected_student, 'course_id' => $course_id, 'status' => 1]);
			} else {
				$result = DB::table('students_courses')->where('user_id', $selected_student)->where('course_id', $course_id)->update(['user_id' => $selected_student, 'course_id' => $course_id, 'status' => 1]);
			}
		}

		Session::flash('msg', 'Students Added in this Cource.');
		return redirect()->back();
	}



	public function assign_courses_to_teachers()
	{
		$courses = DB::table('courses')->where('status', 1)->get();
		return view('admin.assign_courses_to_teachers', ['courses' => $courses]);
	}


	public function view_added_teachers($id)
	{
		$courses = DB::table('courses')->where('id', $id)->get();
		$teachers = DB::table('teachers_courses')->where('teachers_courses.status', 1)->where('teachers_courses.course_id', $id)->join('users', 'users.id', '=', 'teachers_courses.user_id')->select('teachers_courses.id', 'users.name as teacher', 'users.email')->get();
		return view('admin.view_added_teachers', compact('courses', 'teachers'));
	}


	public function remove_teacher_from_cource(Request $request)
	{
		$result = DB::table('teachers_courses')->where('id', '=', $request->id)->update(['status' => $request->status]);
		Session::flash('msg', 'Teacher Removed from this Cource.');
		return redirect()->back();
	}

	public function add_teachers_to_course($course_id)
	{
		$teachers = DB::table('users')->where('role_type', 2)->select('users.id', 'users.name as teacher', 'users.email')->get();
		$teachers_courses = DB::table('teachers_courses')->where('course_id', $course_id)->get();
		$courses = DB::table('courses')->where('id', $course_id)->get();
		return view('admin.add_teachers_to_course', compact('courses', 'teachers', 'course_id', 'teachers_courses'));
	}

	public function selected_teachers_add_to_course(Request $request)
	{
		$selected_teachers = $request->selected_teachers;
		$course_id = $request->course_id;

		if (!$selected_teachers) {
			Session::flash('msg', 'Please Select Students');
			return redirect()->back();
		}

		foreach ($selected_teachers as $selected_teacher) {
			$teachers = DB::table('teachers_courses')->where('user_id', $selected_teacher)->where('course_id', $course_id)->first();
			if (!$teachers) {
				$result = DB::table('teachers_courses')->insert(['user_id' => $selected_teacher, 'course_id' => $course_id, 'status' => 1]);
			} else {
				$result = DB::table('teachers_courses')->where('user_id', $selected_teacher)->where('course_id', $course_id)->update(['user_id' => $selected_teacher, 'course_id' => $course_id, 'status' => 1]);
			}
		}

		Session::flash('msg', 'Teachers Added in this Cource.');
		return redirect()->back();
	}


	public function teacher_view_courses()
	{
		$courses = DB::table('teachers_courses')->join('courses', 'courses.id', '=', 'teachers_courses.course_id')->where('teachers_courses.user_id', Session::get('user')['id'])->where('teachers_courses.status', 1)->get();
		//dd($courses);
		return view('teacher.view_courses', compact('courses'));
	}

	public function admin_view_weeks(Request $request, $course_id)
	{
		$course_name = DB::table('courses')->where('id', $course_id)->first();
		$course_name = $course_name->name;
		$courses_weeks = DB::table('courses_weeks')->where('courses_weeks.status', 1)->where('courses_weeks.course_id', $course_id)->get();
		$week_id = null;
		$week_name = null;
		if (isset($request->week_id)) {
			$week_id = $request->week_id;
			$record = DB::table('courses_weeks')->where('id', $week_id)->first();
			$week_name = $record->week_name;
		}
		return view('admin.view_weeks', compact('courses_weeks', 'course_id', 'course_name', 'week_id', 'week_name'));
	}

	public function teacher_view_weeks(Request $request, $course_id)
	{
		$course_name = DB::table('courses')->where('id', $course_id)->first();
		$course_name = $course_name->name;
		$courses_weeks = DB::table('courses_weeks')->where('courses_weeks.status', 1)->where('courses_weeks.course_id', $course_id)->get();

		$week_id = null;
		$week_name = null;

		if (isset($request->week_id)) {
			$week_id = $request->week_id;
			$record = DB::table('courses_weeks')->where('id', $week_id)->first();
			$week_name = $record->week_name;
		}

		return view('teacher.view_weeks', compact('courses_weeks', 'course_id', 'course_name', 'week_id', 'week_name'));
	}

	public function admin_add_weeks(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'week_name' => 'required|max:255',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}

		$result = DB::table('courses_weeks')->insert(['week_name' => $request->week_name, 'course_id' => $request->course_id]);
		Session::flash('msg', 'New Week Added in this Cource.');
		return redirect()->back();
	}

	public function admin_update_week(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'week_name' => 'required|max:255',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}

		$result = DB::table('courses_weeks')->where('id', $request->week_id)->update(['week_name' => $request->week_name]);
		Session::flash('msg', 'Week Name Updated.');
		return redirect("/admin/view_added_courses/view_weeks/$request->course_id");
	}


	public function admin_delete_week(Request $request)
	{
		$result = DB::table('courses_weeks')->where('id', $request->week_id)->update(['status' => 2]);
		Session::flash('msg', 'Week has been Deleted.');
		return redirect("/admin/view_added_courses/view_weeks/$request->course_id");
	}


	public function admin_edit_quiz_question($topic_id, $q_id)
	{
		$question = DB::table('quiz_questions')->where('q_id', $q_id)->first();
		$question_options = DB::table('quiz_question_options')->where('q_id', $q_id)->get();
		return view('admin.edit_quiz_question', compact('question', 'question_options'));
	}

	public function teacher_view_topics($course_id, $week_id)
	{

		$course_name = DB::table('courses')->where('id', $course_id)->first();
		$course_name = $course_name->name;
		//$courses_weeks=DB::table('courses_weeks')->where('courses_weeks.status',1)->where('courses_weeks.status',1)->get();

		$record = DB::table('courses_weeks')->where('id', $week_id)->first();
		$week_name = $record->week_name;
		$courses_weeks = null;

		$topics = DB::table('topics')->where('user_id', Session::get('user')['id'])->where('week_id', '=', $week_id)->orderBy('id', 'DESC')->get();

		//Haseeb
		$discussion = DB::table('week_thread')->where('week_id',  $week_id)->first();

		$assessment = DB::table('assessment')->where('week_id',  $week_id)->first();

		return view('teacher.view_topics', compact('course_name', 'week_name', 'course_id', 'week_id', 'courses_weeks', 'topics', 'discussion', 'assessment'));
	}

	public function teacher_add_topic($course_id, $week_id)
	{
		return view('teacher.add_topic', ['course_id' => $course_id, 'week_id' => $week_id]);
	}

	public function teacher_doadd_topic(Request $request)
	{
		$id = DB::table('topics')->insertGetId(array(
			'topic' => $request->topic_name,
			'week_id' => $request->week_id,
			'user_id' => Session::get('user')['id'],
		));
		if (isset($request->content[0])) {
			for ($i = 0; $i < count($request->content); $i++) {
				$compulsary = "";
				if ($request->type[$i] == "V" && isset($request->compulsary[$i]) && $request->compulsary[$i] != "") {
					$compulsary = 1;
				}
				$insert = DB::table('topics_data')->insert(array(
					'topic_id' => $id,
					'type' => $request->type[$i],
					'content' => $request->content[$i],
					'video_title' => $request->video_title[$i],
					'video_url' => $request->video_url[$i],
					'time' => ($request->time_mint[$i] * 60) + $request->time_sec[$i],
					'compulsary' => $compulsary,
				));
			}
		}
		if (isset($request->quiz_is_added)) {
			$insert = DB::table('topics_data')->insert(array(
				'topic_id' => $id,
				'type' => 'Q',
				'content' => "",
				'video_title' => "",
				'video_url' => "",
				'time' => ($request->quiz_time_mint * 60) + $request->quiz_time_sec,
				'compulsary' => "",
				'quiz_result_status' => $request->quiz_result_auto_announce ? 1 : 0
			));
			for ($t = 1; $t <= $request->quiz_len; $t++) {
				$q_type = 'q_type_' . $t;

				if (isset($request->$q_type)) {

					if ($request->$q_type == 1) {
						$q_title = 'tf_qst_' . $t;
						$is_correct = '';
					} elseif ($request->$q_type == 2) {
						$q_title = 'q_baq_' . $t;
						$is_correct = 'baq_ans_' . $t;
						$is_correct = $request->$is_correct;
					} elseif ($request->$q_type == 3) {
						$q_title = 'q_seq_' . $t;
						$is_correct = '';
					}
					$insert_tf = DB::table('quiz_questions')->insertGetId(array(
						'topic_id' => $id,
						'week_id' => $request->week_id,
						'q_title' => $request->$q_title,
						'question_type' => $request->$q_type,
						'correct_answer' => $is_correct
					));
					if ($request->$q_type == 2) {
						$q_options = 'q_options_' . $t;
						$q_options = $request->$q_options;
						for ($tf_o = 'a'; $tf_o <= $q_options; $tf_o++) {
							$o_title = 'baq_ans_' . $tf_o . '_' . $t;
							$insert_tf_options = DB::table('quiz_question_options')->insert(array(
								'q_id' => $insert_tf,
								'o_title' => $request->$o_title,
							));
						}
					} elseif ($request->$q_type == 1) {
						$q_options = 'q_options_' . $t;
						$q_options = $request->$q_options;
						for ($tf_o = 'a'; $tf_o <= $q_options; $tf_o++) {
							$o_title = 'tf_qst_' . $tf_o . '_' . $t;
							$o_ans = 'tf_ans_' . $tf_o . '_' . $t;
							$insert_tf_options = DB::table('quiz_question_options')->insert(array(
								'q_id' => $insert_tf,
								'o_title' => $request->$o_title,
								'sub_answer' => $request->$o_ans,
							));
						}
					}
				}
			}
		}
		return redirect("teacher/view_courses/view_topic/$id");
	}

	public function teacher_view_topic(Request $request)
	{
		$data = Topics::where('topics.id', $request->topic_id)->with('topics_data')->get()->toArray();
		$Quiz_question = Quiz_question::where('topic_id', $request->topic_id)->with('question_options')->get()->toArray();
		//$data=DB::table('topics')->where('topics.id',$request->topic_id)->join('topics_data','topics.id','=','topics_data.topic_id')->get();
		//dd($data);
		return view('teacher.view_topic', ['topic' => $data, 'quiz_question' => $Quiz_question]);
	}

	public function teacher_edit_topic(Request $request, $id)
	{
		$data = Topics::where('topics.id', $id)->with('topics_data')->get()->toArray();
		$select_quiz = DB::table('topics_data')->where('topic_id', $id)->where('type', 'Q')->first();
		return view('teacher.edit_topic', ['topic' => $data, 'select_quiz' => $select_quiz, 'topic_id' => $request->topic_id]);
	}

	public function teacher_dodeletetopicdata(Request $request)
	{
		$data = DB::table('topics_data')->where('id', $request->id)->delete();
		return $data;
	}


	public function teacher_doupdate_topic(Request $request)
	{
		$topic_id = $request->topic_id;
		$id = DB::table('topics')->where('id', $topic_id)->update(array(
			'topic' => $request->topic_name,
		));
		$insert = DB::table('topics_data')->where('topic_id', $topic_id)->delete();
		if (isset($request->content[0])) {
			for ($i = 0; $i < count($request->content); $i++) {
				$insert = DB::table('topics_data')->insert(
					array(
						'topic_id' => $topic_id,
						'type' => $request->type[$i],
						'content' => $request->content[$i],
						'video_title' => $request->video_title[$i],
						'video_url' => $request->video_url[$i],
						'time' => ($request->time_mint[$i] * 60) + $request->time_sec[$i],
						'compulsary' => $request->is_compulsory
					)
				);
			}
		}
		if (isset($request->quiz_is_added)) {
			$insert = DB::table('topics_data')->insert(array(
				'topic_id' => $topic_id,
				'type' => 'Q',
				'content' => "",
				'video_title' => "",
				'video_url' => "",
				'time' => ($request->quiz_time_mint * 60) + $request->quiz_time_sec,
				'quiz_result_status' => $request->quiz_result_auto_announce ? 1 : 0
			));
			for ($t = 1; $t <= $request->quiz_len; $t++) {
				$q_type = 'q_type_' . $t;
				if (isset($request->$q_type)) {
					if ($request->$q_type == 1) {
						$q_title = 'tf_qst_' . $t;
						$is_correct = '';
					} elseif ($request->$q_type == 2) {
						$q_title = 'q_baq_' . $t;
						$is_correct = 'baq_ans_' . $t;
						$is_correct = $request->$is_correct;
					} elseif ($request->$q_type == 3) {
						$q_title = 'q_seq_' . $t;
						$is_correct = '';
					}
					$insert_tf = DB::table('quiz_questions')->insertGetId(array(
						'topic_id' => $topic_id,
						'week_id' => $request->week_id,
						'q_title' => $request->$q_title,
						'question_type' => $request->$q_type,
						'correct_answer' => $is_correct
					));
					if ($request->$q_type == 2) {
						$q_options = 'q_options_' . $t;
						$q_options = $request->$q_options;
						for ($tf_o = 'a'; $tf_o <= $q_options; $tf_o++) {
							$o_title = 'baq_ans_' . $tf_o . '_' . $t;
							$insert_tf_options = DB::table('quiz_question_options')->insert(array(
								'q_id' => $insert_tf,
								'o_title' => $request->$o_title,
							));
						}
					} elseif ($request->$q_type == 1) {
						$q_options = 'q_options_' . $t;
						$q_options = $request->$q_options;
						for ($tf_o = 'a'; $tf_o <= $q_options; $tf_o++) {
							$o_title = 'tf_qst_' . $tf_o . '_' . $t;
							$o_ans = 'tf_ans_' . $tf_o . '_' . $t;
							$insert_tf_options = DB::table('quiz_question_options')->insert(array(
								'q_id' => $insert_tf,
								'o_title' => $request->$o_title,
								'sub_answer' => $request->$o_ans,
							));
						}
					}
				}
			}
		}
		return redirect("teacher/view_courses/view_topic/$topic_id");
	}

	public function teacher_topic_send_for_approval(Request $request, $id)
	{
		$id = DB::table('topics')->where('id', $id)->update(array(
			'status' => 'UA',
		));
		return back();
	}

	public function admin_view_topics(Request $request, $course_id, $week_id)
	{
		$course_name = DB::table('courses')->where('id', $course_id)->first();
		$course_name = $course_name->name;
		$week_name = DB::table('courses_weeks')->where('id', $week_id)->first();
		$week_name = $week_name->week_name;
		$topics = DB::table('topics')->where('topics.week_id', $week_id)->where('topics.status', '!=', 'P')->join('users', 'topics.user_id', '=', 'users.id')->select('users.name', 'topics.id', 'topics.topic', 'topics.status')->orderBy('topics.id', 'DESC')->get();
		return view('admin.view_topics', ['topics' => $topics, 'course_name' => $course_name, 'week_name' => $week_name]);
	}

	public function admin_view_topic($topic_id)
	{
		$Quiz_question = Quiz_question::where('topic_id', $topic_id)->with('question_options')->get()->toArray();
		$data = Topics::where('topics.id', $topic_id)->with('topics_data')->get()->toArray();
		return view('admin.view_topic', ['topic' => $data, 'quiz_question' => $Quiz_question]);
	}


	public function admin_doaddcommenttopic(Request $request)
	{
		$result = DB::table('topics')->where('id', $request->id)->update(array(
			'admin_comment' => "$request->admin_comment",
		));
	}


	public function admin_reject_topic(Request $request, $id)
	{
		$result = DB::table('topics')->where('id', $id)->update(array(
			'status' => 'R',
		));
		return back();
	}

	public function admin_approve_topic(Request $request, $id)
	{
		$result = DB::table('topics')->where('id', $id)->update(array(
			'status' => 'A',
		));
		return back();
	}


	public function admin_edit_topic($id)
	{
		$data = Topics::where('topics.id', $id)->with('topics_data')->get()->toArray();
		$select_quiz = DB::table('topics_data')->where('topic_id', $id)->where('type', 'Q')->first();
		return view('admin.edit_topic', ['topic' => $data, 'select_quiz' => $select_quiz, 'topic_id' => $id]);
	}


	public function admin_doupdate_topic(Request $request)
	{
		$topic_id = $request->topic_id;
		$id = DB::table('topics')->where('id', $topic_id)->update(array(
			'topic' => $request->topic_name,
		));
		$insert = DB::table('topics_data')->where(function ($query) {
			$query->where('type', '=', 'R')
				->orWhere('type', '=', 'V');
		})->where('topic_id', $topic_id)->delete();

		if (isset($request->content[0])) {
			for ($i = 0; $i < count($request->content); $i++) {
				$insert = DB::table('topics_data')->insert(
					array(
						'topic_id' => $topic_id,
						'type' => $request->type[$i],
						'content' => $request->content[$i],
						'video_title' => $request->video_title[$i],
						'video_url' => $request->video_url[$i],
						'time' => ($request->time_mint[$i] * 60) + $request->time_sec[$i],
					)
				);
			}
		}


		if (isset($request->quiz_is_added)) {
			$insert = DB::table('topics_data')->insert(array(
				'topic_id' => $topic_id,
				'type' => 'Q',
				'content' => "",
				'video_title' => "",
				'video_url' => "",
				'time' => ($request->quiz_time_mint * 60) + $request->quiz_time_sec,
				'quiz_result_status' => $request->quiz_result_auto_announce ? 1 : 0
			));


			for ($t = 1; $t <= $request->quiz_len; $t++) {
				$q_type = 'q_type_' . $t;

				if (isset($request->$q_type)) {

					if ($request->$q_type == 1) {
						$q_title = 'tf_qst_' . $t;
						$is_correct = '';
					} elseif ($request->$q_type == 2) {
						$q_title = 'q_baq_' . $t;
						$is_correct = 'baq_ans_' . $t;
						$is_correct = $request->$is_correct;
					} elseif ($request->$q_type == 3) {
						$q_title = 'q_seq_' . $t;
						$is_correct = '';
					}

					$insert_tf = DB::table('quiz_questions')->insertGetId(array(
						'topic_id' => $topic_id,
						'week_id' => $request->week_id,
						'q_title' => $request->$q_title,
						'question_type' => $request->$q_type,
						'correct_answer' => $is_correct
					));


					if ($request->$q_type == 2) {
						$q_options = 'q_options_' . $t;
						$q_options = $request->$q_options;
						for ($tf_o = 'a'; $tf_o <= $q_options; $tf_o++) {

							$o_title = 'baq_ans_' . $tf_o . '_' . $t;

							$insert_tf_options = DB::table('quiz_question_options')->insert(array(
								'q_id' => $insert_tf,
								'o_title' => $request->$o_title,
							));
						}
					} elseif ($request->$q_type == 1) {
						$q_options = 'q_options_' . $t;
						$q_options = $request->$q_options;
						for ($tf_o = 'a'; $tf_o <= $q_options; $tf_o++) {

							$o_title = 'tf_qst_' . $tf_o . '_' . $t;
							$o_ans = 'tf_ans_' . $tf_o . '_' . $t;

							$insert_tf_options = DB::table('quiz_question_options')->insert(array(
								'q_id' => $insert_tf,
								'o_title' => $request->$o_title,
								'sub_answer' => $request->$o_ans,
							));
						}
					}
				}
			}
		}
		return redirect("admin/view_added_courses/view_topic/$topic_id");
	}

	public function admin_edit_quiz($topic_id)
	{
		$topic = DB::table('topics')->where('id', $topic_id)->first();
		$topic_name = $topic->topic;
		$Topic_data = DB::table('topics_data')->where('topic_id', $topic_id)->where('type', 'Q')->first();
		$Quiz_question = Quiz_question::where('topic_id', $topic_id)->with('question_options')->get()->toArray();
		return view('admin.edit_quiz', ['topic_id' => $topic_id, 'quiz_question' => $Quiz_question, 'data' => $Topic_data, 'topic_name' => $topic_name]);
	}

	public function teacher_add_discussion($course_id, $week_id)
	{
		return view('teacher.add_discussion', ['course_id' => $course_id, 'week_id' => $week_id]);
	}

	public function teacher_doadd_discussion(Request $req)
	{
		$req->validate([
			'topic_name' => 'required'
		]);

		DB::table('week_thread')->insert([
			'create_by' => Session::get('user')['id'],
			'week_id' => $req->week_id,
			'course_id' => $req->course_id,
			'thread_title' => $req->topic_name,
			'status' => 1,
		]);
		return redirect("teacher/view_courses/view_topics/$req->course_id/$req->week_id");
	}

	public function teacher_edit_discussion($course_id, $week_id)
	{
		$discussion = DB::table('week_thread')->where('course_id', '=', $course_id)->where('week_id', '=', $week_id)->get();
		return view('teacher.edit_discussion', ['discussion' => $discussion, 'course_id' => $course_id, 'week_id' => $week_id]);
		// return $discussion;
	}

	public function teacher_doupdate_discussion($id, Request $request)
	{
		$request->validate(
			[
				'topic_name' => 'required'
			],
			[
				'topic_name.required' => 'Discussion Title is required'
			]
		);
		DB::table('week_thread')->where('thread_id', $id)->update(['thread_title' => $request->topic_name]);
		return back()->with('success', 'Discussion Update Successfully');
	}

	public function add_assessment($course_id, $week_id)
	{
		$course = DB::table('courses')->where('id', '=', $course_id)->first();
		$week = DB::table('courses_weeks')->where('id', '=', $week_id)->first();
		return view('teacher.assessment.add_assessment', ['course' => $course, 'week' => $week]);
	}

	public function teacher_doadd_assessment(Request $req)
	{
		$req->validate([
			'assessment_name' => 'required'
		], [
			'assessment_name.required' => 'Assessment Title is required.'
		]);

		$id = DB::table('assessment')->insertGetId(array(
			'create_by' => Session::get('user')['id'],
			'week_id' => $req->week_id,
			'course_id' => $req->course_id,
			'asessment_title' => $req->assessment_name,
			'status' => 1,
		));

		for ($i = 0; $i < count($req->count); $i++) {
			$a = "instructions_" . $i;
			$b = "word_limit_" . $i;
			$qst_id = DB::table('assessment_questions')->insertGetId([
				'create_by' => Session::get('user')['id'],
				'assessment_id' => $id,
				'instructions' => $req->$a,
				'word_limit' => $req->$b,
				'status' => 1,
			]);
			$point = "point_" . $i;
			$means = "means_" . $i;
			for ($k = 0; $k < count($req->$point); $k++) {
				DB::table('assessment_point')->insert(array(
					'create_by' => Session::get('user')['id'],
					'assessment_id' => $id,
					'question_id' => $qst_id,
					'point' => $req->$point[$k],
					'descriptions' => $req->$means[$k],
				));
			}
		}
		return redirect("teacher/view_courses/view_topics/$req->course_id/$req->week_id");
	}

	public function teacher_doupdate_assessment($id, Request $req)
	{
		$req->validate([
			'assessment_name' => 'required'
		], [
			'assessment_name.required' => 'Assessment Title is required.'
		]);
		if ($req->is_active == "on") {
			$status = true;
		} else {
			$status = false;
		}
		DB::table('assessment')->where('id', $id)->update(['asessment_title' => $req->assessment_name, 'status' => (int)$status]);
		return back()->with('success', 'Assessment Updated Successfully!!!');
	}

	public function edit_assessment($course_id, $week_id)
	{
		$course = DB::table('courses')->where('id', '=', $course_id)->first();
		$week = DB::table('courses_weeks')->where('id', '=', $week_id)->first();

		$assessment = DB::table('assessment')->where('course_id', $course_id)->where('week_id', $week_id)->first();
		return view('teacher.assessment.edit_assessment', ['assessment' => $assessment, 'course' => $course, 'week' => $week]);
	}

	public function view_assessments()
	{
		$forums = DB::table('teachers_courses')->select('courses.name as course_name', 'teachers_courses.user_id as user_id', 'courses.id as course_id')
			->join('courses', 'courses.id', '=', 'teachers_courses.course_id')
			->where('user_id', '=', Session::get('user')['id'])
			->get();
		return view('teacher.assessment.view_assessment', compact('forums'));
	}

	public function get_students_by_assessment($assessment_id)
	{
		$week = DB::table('assessment')->join('courses_weeks', 'assessment.week_id', 'courses_weeks.id')
			->select('courses_weeks.week_name as week_name', 'assessment.id as assessment_id', 'assessment.week_id as week_id', 'assessment.asessment_title')
			->where('assessment.id', $assessment_id)
			->first();
		$count =  count(DB::table('assessment_attempt')->where('assessment_id', $week->assessment_id)->get());

		$attempts = DB::table('assessment_attempt')->where('assessment_id', $week->assessment_id)
			->select('users.name as name', 'assessment_attempt.assessment_id as assessment_id', 'assessment_attempt.attempt_by as attempt_by', 'assessment_attempt.id as attempt_id')
			->join('users', 'users.id', '=', 'assessment_attempt.attempt_by')
			->get();
		return view('teacher.assessment.view_assessment_students', compact('attempts', 'count', 'week'));
	}

	public function get_student_feedback($attempt_id)
	{
		$attempt = DB::table('assessment_attempt')->where('id', $attempt_id)->first();
		$a_qst = DB::table('assessment_questions')->where('assessment_id', $attempt->assessment_id)->where('status', 1)->get();

		$view_students = DB::table('assessment_attempt')
			->join('assessment', 'assessment.id', 'assessment_attempt.assessment_id')
			->join('users', 'users.id', 'assessment_attempt.attempt_by')
			->select('users.name as name', 'users.id as id', 'assessment.asessment_title as asessment_title')
			->where('assessment_attempt.id', $attempt_id)->first();

		$feedbacks = DB::table('assessment_feedbacks')
			->select('users.name as name', 'assessment_feedbacks.feedback_by as feedback_by')
			->join('users', 'users.id', 'assessment_feedbacks.feedback_by')
			->groupBy('assessment_feedbacks.feedback_by')
			->where('answer_by', $view_students->id)
			->where('assessment_id', $attempt->assessment_id)
			->get();

		return view('teacher.assessment.review_assessment', compact('attempt', 'a_qst', 'feedbacks', 'view_students'));
	}

	public function edit_quiz($topic_id)
	{
		$topic = DB::table('topics')->where('id', $topic_id)->first();
		$topic_name = $topic->topic;
		$Topic_data = DB::table('topics_data')->where('topic_id', $topic_id)->where('type', 'Q')->first();
		$Quiz_question = Quiz_question::where('topic_id', $topic_id)->with('question_options')->get()->toArray();
		return view('teacher.edit_quiz', ['topic_id' => $topic_id, 'quiz_question' => $Quiz_question, 'data' => $Topic_data, 'topic_name' => $topic_name]);
	}

	public function delete_quiz_question($topic_id, $q_id)
	{
		DB::table('quiz_questions')->where('q_id', $q_id)->delete();
		DB::table('quiz_question_options')->where('q_id', $q_id)->delete();

		return back();
	}

	public function edit_quiz_question($topic_id, $q_id)
	{
		$question = DB::table('quiz_questions')->where('q_id', $q_id)->first();
		$question_options = DB::table('quiz_question_options')->where('q_id', $q_id)->get();
		return view('teacher.edit_quiz_question', compact('question', 'question_options'));
	}

	public function do_update_quiz_question(Request $request)
	{
		$q_id = $request->question_id;
		$question = $request->question;
		$question_type = $request->question_type;

		$question_array = array(
			'q_title' => $question,
		);

		if ($question_type == 2) {
			$question_array['correct_answer'] = $request->baq_ans;
		}

		$result = DB::table('quiz_questions')->where('q_id', $q_id)->update($question_array);


		if ($question_type == 1 || $question_type == 2) {
			DB::table('quiz_question_options')->where('q_id', $q_id)->delete();
			for ($i = 'a'; $i < $request->q_option_counter; $i++) {

				if ($question_type == 1) {
					$q_option = 'tf_qst_' . $i;
					$q_option = $request->$q_option;
				} else if ($question_type == 2) {
					$q_option = 'baq_ans_' . $i;
					$q_option = $request->$q_option;
				}

				$array = array(
					'o_title' => $q_option,
					'q_id' => $q_id,
				);

				if ($question_type == 1) {

					$q_option_ans = 'tf_ans_' . $i;
					$q_option_ans = $request->$q_option_ans;

					$array['sub_answer'] = $q_option_ans;
				}

				$question_options = DB::table('quiz_question_options')->insert($array);
			}
		}

		if (Session::get('user')['id'] == 1) {
			return redirect('admin/view_added_courses/edit_quiz/' . $request->topic_id);
		} elseif (Session::get('user')['id'] == 2) {
			return redirect('teacher/view_courses/edit_quiz/' . $request->topic_id);
		}

		// return redirect($url);
	}


	public function doupdate_quiz_time(Request $request)
	{
		$result = DB::table('topics_data')->where('type', 'Q')->update(
			array('time' => ($request->time_mint * 60) + $request->time_sec)
		);
		return back();
	}

	public function view_courses_certificate()
	{
		$courses = DB::table('courses')->where('status', 1)->get();
		return view('admin.view_courses_certificate', compact('courses'));
	}

	public function addfinalquiz($course_id, $week_id)
	{
		return view('teacher.add_final_quiz', compact('course_id', 'week_id'));
	}

	public function doaddinstructorsignature(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'instructor_name' => 'required|max:255',
			'instructor_signature' => 'mimes:jpeg,jpg,png|required|max:10000'
		], [
			'instructor_signature' => 'The image is required'
		]);

		if ($validator->fails()) {

			$instructor_name = '';
			if ($validator->errors()->has('instructor_name')) {
				$instructor_name = $validator->errors()->first('instructor_name');
			}

			$instructor_signature = '';
			if ($validator->errors()->has('instructor_signature')) {
				$instructor_signature = $validator->errors()->first('instructor_signature');
			}
			return response()->json(['error' => $validator->errors()->all(), 'error_name' => $instructor_name, 'error_image' => $instructor_signature]);
		} else {
			$filename = $request->instructor_signature->getClientOriginalName();
			$extension = $request->instructor_signature->extension();
			$withoutextenstion = substr($filename, 0, strrpos($filename, "."));
			$signature = $withoutextenstion . "_" . time() . "." . $extension;
			$request->instructor_signature->storeAs('/public', $signature);
			$instructor_name = $request->instructor_name;
			$result = DB::table('signatures')->insert([
				'instructor_name' => $instructor_name, 'instructor_signature' => $signature
			]);
			Session::flash('msg' . 'Added new Certificate.');
			return response()->json(['success' => 'Added new Certificate.']);
		}
	}

	public function addcertificate(Request $request, $course_id)
	{
		$instructor_list = DB::table('signatures')->get();




		$course = DB::table('courses')->where('id', $course_id)->first();
		return view('admin.add_certificate', compact('course', 'instructor_list'));
	}

	public function doaddcertificate(Request $request)
	{
		return view('admin.add_certificate');
	}

	public function showcoursescertificate()
	{
		return view('teacher.showcertificate');
	}
}
