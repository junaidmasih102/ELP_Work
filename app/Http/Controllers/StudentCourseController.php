<?php

namespace App\Http\Controllers;

use App\Models\Topics;
use App\Models\Courses;
use App\Models\Topics_data;
use App\Models\Courses_week;
use Illuminate\Http\Request;
use App\Models\Quiz_question;
use App\Models\Topics_data_seen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use League\CommonMark\Extension\Table\Table;

class StudentCourseController extends Controller
{
	public function __construct(Request $request)
	{


		$id = $request->course_id;

		// $courseid = $request->id;
		// $data2 = Courses::where('id', $courseid)->where('status', 1)->get();
		$data = Courses_week::where('course_id', $id)->where('status', 1)->get();

		View::share('course_weeks_sidebar', $data);
		// , 'courses_name', $data2
	}

	public function course_dashbaord(Request $request, $id)
	{

		$data_module = DB::table('courses')
			->select('*')
			->join('courses_weeks', 'courses_weeks.course_id', '=', 'courses.id')
			->join('topics', 'topics.week_id', '=', 'courses_weeks.id')
			->join('topics_data', 'topics_data.topic_id', '=', 'topics.id')
			->join('assessment', 'assessment.course_id', '=', 'courses.id')

			->where('courses.id', $id)
			->where('topics_data.type', 'V')
			->get();

		// $data = Courses_week::where('course_id', $id)->where('status', 1)->with('topics')->get();

		return view('student.course_dashboard', ['data_module' => $data_module, 'course_id' => $id]);
	}


	// $data = Courses_week::where('course_id', $id)->where('status', 1)->with('topics')->get();

	// return view('student.course_dashboard', ['course_weeks' => $data, 'course_id' => $id]);


	public function course_home(Request $request, $id)
	{


		$data = Courses_week::where('course_id', $id)->where('status', 1)->with('topics')->get();
		return view('student.course', ['course_weeks' => $data, 'course_id' => $id]);
	}

	public function student_view_courses()
	{

		$courses = DB::table('students_courses')->join('courses', 'courses.id', '=', 'students_courses.course_id')->where('students_courses.user_id', Session::get('user')['id'])->where('students_courses.status', 1)->get();
		return view('student.view_courses', compact('courses'));
	}

	// public function course_videos(Request $request, $course_id, $week)
	// {
	// 	$week_r = $week;
	// 	$week = str_replace("_", " ", $week);
	// 	$weeks = DB::table('courses_weeks')->where('course_id', $course_id)->where('week_name', $week)->where('status', 1)->first();
	// 	$week_id = $weeks->id;
	// 	$topics = Topics::where('week_id', $week_id)->where('status', "A")->with('topics_data_video')->get()->toArray();
	// 	return view('student.course_videos', ['topics' => $topics, 'course_id' => $course_id, 'week' => $week_r, 'cur_video' => null]);
	// }


	public function course_video(Request $request, $course_id, $week, $v_id)
	{
		$week_r = $week;
		$week = str_replace("_", " ", $week);
		$weeks = DB::table('courses_weeks')->where('course_id', $course_id)->where('week_name', $week)->where('status', 1)->first();

		$week_id = $weeks->id;

		$topics = Topics::where('week_id', $week_id)->where('status', "A")->with('topics_data_video')->get()->toArray();

		$cur_video = DB::table('topics_data')->where('id', $v_id)->first();

		$compulsory = DB::table('topics_data')->where('id', $v_id)->pluck('compulsary')->first();

		return view('student.course_videos', ['topics' => $topics, 'compulsory' => $compulsory, 'course_id' => $course_id, 'week' => $week_r, 'cur_video' => $cur_video]);
	}


	// public function course_readings(Request $request, $course_id, $week)
	// {
	// 	$week_r = $week;
	// 	$week = str_replace("_", " ", $week);
	// 	$weeks = DB::table('courses_weeks')->where('course_id', $course_id)->where('week_name', $week)->where('status', 1)->first();
	// 	$week_id = $weeks->id;
	// 	$topics = Topics::where('week_id', $week_id)->where('status', "A")->with('topics_data_reading')->get()->toArray();
	// 	//dd($topics);
	// 	return view('student.course_readings', ['topics' => $topics, 'course_id' => $course_id, 'week' => $week_r, 'cur_video' => null]);
	// }


	public function course_reading(Request $request, $course_id, $week, $v_id)
	{

		$week_r = $week;

		$week = str_replace("_", " ", $week);
		$weeks = DB::table('courses_weeks')->where('course_id', $course_id)->where('week_name', $week)->where('status', 1)->first();
		$week_id = $weeks->id;

		$topics = Topics::where('week_id', $week_id)->where('status', "A")->with('topics_data_reading')->get()->toArray();

		$cur_video = Topics_data::where('id', $v_id)->with('topics_data_seen')->first();
		return view('student.course_readings', ['topics' => $topics, 'course_id' => $course_id, 'week' => $week_r, 'cur_video' => $cur_video]);
	}


	public function mark_as_read($course_id, $topic_data_id)
	{
		$result = DB::table('topics_data_seen')->where('topics_data_id', $topic_data_id)->where('user_id', Session::get('user')['id'])->where('course_id', $course_id)->first();

		if ($result == null) {
			$cur_video = DB::table('topics_data_seen')->insert(
				array(
					'topics_data_id' => $topic_data_id,
					'user_id' => Session::get('user')['id'],
					'course_id' => $course_id,
				)
			);
		}
		return back();
	}

	public function video_watched($course_id, $topic_data_id)
	{
		$result = DB::table('topics_data_seen')->where('topics_data_id', $topic_data_id)->where('user_id', Session::get('user')['id'])->where('course_id', $course_id)->first();

		if ($result == null) {
			$cur_video = DB::table('topics_data_seen')->insert(
				array(
					'topics_data_id' => $topic_data_id,
					'user_id' => Session::get('user')['id'],
					'course_id' => $course_id,
				)
			);
		}
		return back();
	}

	// public function week_data($id, $week)
	// {
	// 	$week_ = $week;
	// 	$week = str_replace("_", " ", $week);
	// 	$weeks = DB::table('courses_weeks')->where('course_id', $id)->where('week_name', $week)->where('status', 1)->first();
	// 	$week_id = $weeks->id;

	// 	$topics = Topics::where('week_id', $week_id)->where('status', "A")->with('topics_data')->get()->toArray();

	// 	$data = Courses_week::where('course_id', $id)->where('status', 1)->get();

	// 	$thread_id = DB::table('week_thread')->where('week_id', '=', $week_id)->first();

	// 	$assessment = DB::table('assessment')->where('week_id', '=', $week_id)->where('status', 1)->first();

	// 	return view('student.week', ['course_weeks' => $data, 'topics' => $topics, 'course_id' => $id, 'week' => $week, 'week_' => $week_, 'thread_id' => $thread_id, 'weeks' => $weeks, 'assessment' => $assessment]);
	// }

	public function week_data($id, $week)
	{



		$week_ = $week;
		$week = str_replace("_", " ", $week);
		$weeks = DB::table('courses_weeks')->where('course_id', $id)->where('week_name', $week)->where('status', 1)->first();
		$week_id = $weeks->id;

		$topics = Topics::where('week_id', $week_id)->where('status', "A")->with('topics_data')->get()->toArray();

		$data = Courses_week::where('course_id', $id)->where('status', 1)->get();

		$thread_id = DB::table('week_thread')->where('week_id', '=', $week_id)->first();

		$assessment = DB::table('assessment')->where('week_id', '=', $week_id)->where('status', 1)->first();

		$cond = true;
		foreach ($data as $weekk) {

			$quiz_attempt_cond = $weekk->id;

			$week_topics = Topics::where('week_id', $weekk->id)->where('status', "A")->get()->toArray();

			$weekassessments = DB::table('assessment')->where('week_id', $weekk->id)->where('status', 1)->get();


			foreach ($weekassessments as $weekassessment) {
				$assessment_attempt = DB::table('assessment_attempt')->where('assessment_id', $weekassessments->id)->where('status', 1)->first();
				if ($assessment_attempt == null) {
					$cond = false;
					break;
				}
			}

			foreach ($week_topics as $topic) {
				//$quiz = Topics_data::where('topic_id', $topic)->where('type', 'Q')->with('')->get();

				$quiz_result = DB::table('quiz_result')->where('status', '=', 'A')->where('user_id', Session::get('user')['id'])->where('topic_id', $topic)->first();

				if ($quiz_result == null) {
					$cond = false;
					break;
				}

				if ($cond == false) {
					break;
				}
			}


			if ($cond == false) {
				break;
			}
		}

		// exit;

		return view('student.week', ['course_weeks' => $data, 'topics' => $topics, 'course_id' => $id, 'week' => $week, 'week_' => $week_, 'thread_id' => $thread_id, 'weeks' => $weeks, 'assessment' => $assessment, 'quiz_attempt_cond' => $quiz_attempt_cond]);
	}

	public function course_quiz(Request $request, $id, $week, $topic_id)
	{

		$week_ = $week;
		$week = str_replace("_", " ", $week);
		$weeks = DB::table('courses_weeks')->where('course_id', $id)->where('week_name', $week)->where('status', 1)->first();
		$week_id = $weeks->id;

		$topics = Topics::where('week_id', $week_id)->where('status', "A")->where('id', $topic_id)->get()->toArray();
		$data = Quiz_question::where('topic_id', $topic_id)->with('question_options', 'attempt_question')->get()->toArray();

		$quiz_result = DB::table('quiz_result')->where('status', '!=', 'I')->where('user_id', Session::get('user')['id'])->where('topic_id', request()->topic_id)->first();

		return view('student.course_quiz', ['questions' => $data, 'topics' => $topics, 'course_id' => $id, 'week' => $week, 'week_' => $week_, 'quiz_result' => $quiz_result]);
	}

	public function check_retake($topic_id)
	{
		$result = DB::table('quiz_attempts')->where('topic_id', $topic_id)->where('user_id', Session::get('user')['id'])->where('status', 'A')->first();
		if ($result->next_attempt > time()) {
			dd(date('d-m-Y h:i:s A', $result->next_attempt));
		}
		// dd($result);
		return $result;
	}

	public function course_retake_quiz($course_id, $week_, $topic_id)
	{
		$result = DB::table('quiz_result')->where('topic_id', $topic_id)->where('user_id', Session::get('user')['id'])->update(['status' => 'I']);
		return back();
	}

	public function dosubmit_quiz(Request $request)
	{
		$quiz_attempts_result = DB::table('quiz_attempts')->where('topic_id', $request->topic_id)->where('user_id', Session::get('user')['id'])->where('status', 'A')->first();
		if ($quiz_attempts_result == null) {
			$time = time();
			$time_add_thirty_mints = strtotime('+30 minutes', time());
			DB::table('quiz_attempts')->insert(
				array(
					'topic_id' => $request->topic_id,
					'user_id' => Session::get('user')['id'],
					'attempts' => 1,
					'attempted_on' => $time,
					'next_attempt' => $time_add_thirty_mints,
				)
			);
		} else {
		}
		$total_questions = $request->total_questions;

		if ($total_questions > 0) {

			$get_result_status = DB::table('topics_data')->where('topic_id', $request->topic_id)->where('type', 'Q')->first();
			if ($get_result_status->quiz_result_status == 0) {
				$result_status = 'P';
			} elseif ($get_result_status->quiz_result_status == 1) {
				$result_status = 'A';
			}
			$result_id = DB::table('quiz_result')->insertGetId(array(
				'topic_id' => $request->topic_id,
				'user_id' => Session::get('user')['id'],
				'result' => '',
				'status' => $result_status,
			));
			$total_correct = 0;
			for ($i = 1; $i <= $total_questions; $i++) {
				$q_type = 'q_type_' . $i;
				$q_type = $request->$q_type;
				$q_id = 'q_id_' . $i;
				$q_id = $request->$q_id;
				if ($q_type == 1) {
					$ans = "";
				} elseif ($q_type == 2) {
					$ans = 'baq_ans_' . $i;
					$ans = $request->$ans ?? "";
				} elseif ($q_type == 3) {
					$ans = 'seq_ans_' . $i;
					$ans = $request->$ans ?? "";
				}
				$is_correct = null;
				$array = array(
					'result_id' => $result_id,
					'q_id' => $q_id,
					'answer' => $ans,
					'q_type' => $q_type,
				);
				if ($q_type == 2) {
					$result = DB::table('quiz_questions')->where('q_id', $q_id)->first();
					$c_ans = $result->correct_answer;
					if ($c_ans === $ans) {
						$is_correct = 1;
						$total_correct++;
					} else {
						$is_correct = 0;
					}
					//'q_type'=>$q_type,
					$array['is_correct'] = $is_correct;
				}
				$id = DB::table('quiz_question_answer')->insertGetId($array);
				if ($q_type == 1) {
					$result = DB::table('quiz_question_options')->where('q_id', $q_id)->get(['o_id'])->toArray();
					$alpha = 'a';
					$incorrect_options = 0;
					for ($j = 1; $j <= count($result); $j++) {
						$sub_q_id = 'sub_q_id_' . $alpha . '_' . $i;
						$sub_q_id = $request->$sub_q_id;
						$sub_ans = 'tf_ans_' . $alpha . '_' . $i;
						$sub_ans = $request->$sub_ans;
						$sub_answer = DB::table('quiz_question_options')->where('o_id', $sub_q_id)->first();
						$c_sub_ans = $sub_answer->sub_answer;
						if ($c_sub_ans == $sub_ans) {
							$sub_is_correct = 1;
						} else {
							$sub_is_correct = 0;
							$incorrect_options++;
						}
						$array = array(
							'main_ans_id' => $id,
							'result_id' => $result_id,
							'sub_q_id' => $sub_q_id,
							'sub_answer' => $sub_ans,
							'is_correct' => $sub_is_correct,
						);
						$data = DB::table('quiz_sub_question_answer')->insertGetId($array);
						$alpha++;
					}
					if ($incorrect_options == 0) {
						$total_correct++;
					}
					/*$c_ans=$result->correct_answer;

					if($c_ans===$ans){
						$is_correct=1;
					}
					else{
						$is_correct=0;
					}
					$array['is_correct']=$is_correct;*/
				}
			}
			$result_per = ($total_correct * 100) / $total_questions;
			$result_per = round($result_per, 2);
			DB::table('quiz_result')->where('id', $result_id)->update(['result' => $result_per]);
		}
		return back();
	}

	//Haseeb
	function peer_assessment($course_id, $week)
	{
		$week_name = $week;
		$week = str_replace("_", " ", $week);
		$weeks = DB::table('courses_weeks')->where('course_id', $course_id)->where('week_name', $week)->where('status', 1)->first();
		$course_weeks = Courses_week::where('course_id', $course_id)->where('status', 1)->with('topics')->get();
		$thread_id = DB::table('week_thread')->where('week_id', '=', $weeks->id)->first();
		$assessment = DB::table('assessment')->where('course_id', '=', $course_id)->where('week_id', '=', $weeks->id)->where('status', '=', 1)->first();
		$a_qst = DB::table('assessment_questions')->where('assessment_id', $assessment->id)->where('status', 1)->get();
		$take_assessment = DB::table('assessment_answers')->where('answer_by', Session::get('user')['id'])->where('assessment_id', $assessment->id)->where('status', 1)->get();
		$attempts = DB::table('assessment_attempt')->join('users', 'users.id', 'assessment_attempt.attempt_by')
			->select('users.name', 'assessment_attempt.id AS attempt_id')
			->where('assessment_attempt.assessment_id', $assessment->id)
			->where('assessment_attempt.attempt_by', '!=', Session::get('user')['id'])
			->get();
		$feedbacks = DB::table('assessment_feedbacks')
			->select('users.name as name', 'assessment_feedbacks.feedback_by as feedback_by')
			->join('users', 'users.id', 'assessment_feedbacks.feedback_by')
			->groupBy('assessment_feedbacks.feedback_by', 'name')
			->where('answer_by', Session::get('user')['id'])
			->where('assessment_id', $assessment->id)
			->get();

		return view('student.assessment.take_assessment', compact('feedbacks', 'week_name', 'attempts', 'take_assessment', 'a_qst', 'assessment', 'course_weeks', 'course_id', 'weeks', 'thread_id'));
	}

	function doadd_assessment_answer(Request $req)
	{
		$assessment = DB::table('assessment')->where('course_id', '=', $req->course_id)->where('week_id', '=', $req->week_id)->where('status', '=', 1)->first();
		$q_id = DB::table('assessment_questions')->where('assessment_id', $assessment->id)->where('status', 1)->get();
		foreach ($q_id as $key => $value) {
			$text = $req->answer[$key];

			if (count(explode(' ', $text)) < $value->word_limit) {
				return back()->with('error', 'Please write at least ' . $value->word_limit . 'words');
			} elseif (count(explode(' ', $text)) > $value->word_limit) {
				return back()->with('error', 'Please write maximum ' . $value->word_limit . 'words');
			}
		}
		$attempt_id = DB::table('assessment_attempt')->insertGetId(array(
			'attempt_by' => Session::get('user')['id'],
			'assessment_id' => $req->asessment_id,
			'status' => 1,
		));
		foreach ($q_id as $key => $value) {
			DB::table('assessment_answers')->insert(array(
				'answer_by' => Session::get('user')['id'],
				'assessment_id' => $req->asessment_id,
				'question_id' => $value->id,
				'attempt_id' => $attempt_id,
				'answer' => $req->answer[$key],
				'status' => 1,
			));
		}
		return back();
	}

	function give_review_assessment($course_id, $week, $attempt_id)
	{
		$week = str_replace("_", " ", $week);
		$weeks = DB::table('courses_weeks')->where('course_id', $course_id)->where('week_name', $week)->where('status', 1)->first();
		$assessment = DB::table('assessment')->where('course_id', '=', $course_id)->where('week_id', '=', $weeks->id)->where('status', '=', 1)->first();
		$a_qst = DB::table('assessment_questions')->where('assessment_id', $assessment->id)->where('status', 1)->get();
		$view_students = DB::table('assessment_attempt')
			->join('users', 'users.id', 'assessment_attempt.attempt_by')
			->select('users.name as name', 'users.id as id')
			->where('assessment_attempt.id', $attempt_id)->first();

		$points = DB::table('assessment_point')->where('assessment_id', $assessment->id)->where('question_id', $a_qst[0]->id)->max('point');

		$feedbacks = DB::table('assessment_feedbacks')
			->select('users.name as name', 'assessment_feedbacks.feedback_by as feedback_by')
			->join('users', 'users.id', 'assessment_feedbacks.feedback_by')
			->groupBy('assessment_feedbacks.feedback_by')
			->where('answer_by', $view_students->id)
			->where('assessment_id', $assessment->id)
			->get();

		//For Current User
		$feedback_by = DB::table('assessment_feedbacks')
			->join('users', 'users.id', 'assessment_feedbacks.feedback_by')
			->where('answer_by', $view_students->id)
			->where('feedback_by', Session::get('user')['id'])
			->where('assessment_id', $assessment->id)
			->first();
		return view('student.assessment.review_assessment', compact('feedback_by', 'feedbacks', 'points', 'weeks', 'assessment', 'a_qst', 'view_students', 'course_id'));
	}

	function doadd_assessment_feedback(Request $req)
	{
		$validator = Validator::make($req->all(), [
			'course_id' => 'required',
			'week_id' => 'required',
			'asessment_id' => 'required',
			'std_id' => 'required',
		]);
		if ($validator->fails()) {
			return back()->with('unsuccess', "Something went wrong, please refresh your browser. ");
		} else {
			for ($i = 0; $i < count($req->answer); $i++) {
				$points = "point_" . $i;
				if ($req->$points == 0) {
					DB::table('assessment_feedbacks')->insert(array(
						'answer_by' => $req->std_id,
						'feedback_by' => Session::get('user')['id'],
						'assessment_id' => $req->asessment_id,
						'question_id' => $req->question_id[$i],
						'status' => 1,
					));
				} else {
					DB::table('assessment_feedbacks')->insert(array(
						'answer_by' => $req->std_id,
						'feedback_by' => Session::get('user')['id'],
						'assessment_id' => $req->asessment_id,
						'question_id' => $req->question_id[$i],
						'point' => $req->$points,
						'status' => 1,
					));
				}
			}
			return back()->with('success', "You Successfully give feedback.");
		}
	}
}
