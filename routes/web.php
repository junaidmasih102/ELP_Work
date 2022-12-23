<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuizResultController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CourseController::class, 'show_courses_to_student'])->name('home');

Route::get('/progress', [CourseController::class, 'progress_courses']);

Route::get('/test', [CourseController::class, 'test']);

Route::get('/login', function () {
         return view('login');
});
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/apply_for_cource/{id}', [CourseController::class, 'apply_for_cource']);

Route::get('/course/view_courses', [StudentCourseController::class, 'student_view_courses'])->middleware('auth');

Route::get('/course/{course_id}', [StudentCourseController::class, 'course_home'])->middleware(['auth', 'check.course.access']);


Route::get('/dashboard/{course_id}', [StudentCourseController::class, 'course_dashbaord']);


Route::get('/course/{course_id}/{week}/readings', [StudentCourseController::class, 'course_readings'])->middleware(['auth', 'check.course.access', 'check.course.week']);

Route::get('/course/{course_id}/{week}/video/{topic_data_id}', [StudentCourseController::class, 'course_video'])->middleware(['auth', 'check.course.access', 'check.course.week']);

Route::get('/course/{course_id}/{week}/reading/{topic_data_id}', [StudentCourseController::class, 'course_reading'])->middleware(['auth', 'check.course.access', 'check.course.week']);

Route::get('/mark_as_read/{course_id}/{topic_data_id}', [StudentCourseController::class, 'mark_as_read'])->middleware(['auth', 'check.course.access']);

Route::get('/video_watched/{course_id}/{topic_data_id}', [StudentCourseController::class, 'video_watched'])->middleware(['auth', 'check.course.access']);

Route::get('/course/{course_id}/week/{week}', [StudentCourseController::class, 'week_data'])->middleware(['auth', 'check.course.access', 'check.course.week']);

Route::get('/course/{course_id}/{week}/quiz/{topic_id}', [StudentCourseController::class, 'course_quiz'])->middleware(['auth', 'check.course.access', 'check.course.week']);

Route::post('/dosubmit_quiz', [StudentCourseController::class, 'dosubmit_quiz'])->middleware('auth');

Route::get('/course/{course_id}/{week}/retake_quiz/{topic_id}', [StudentCourseController::class, 'course_retake_quiz'])->middleware(['auth', 'check.course.access', 'check.course.week']);


//Haseeb

Route::get('/discussion/{thread_id}', [ThreadController::class, 'get_discussion'])->middleware(['auth']);

Route::post('/add_query', [ThreadController::class, 'add_query'])->middleware(['auth']);

Route::get('/dis_refresh/{thread_id}', [ThreadController::class, 'refresh_thread'])->middleware(['auth']);

Route::get('/view_thread/{msg_id}', [ThreadController::class, 'get_thread'])->middleware(['auth']);

Route::post('/add_reply', [ThreadController::class, 'add_reply'])->middleware(['auth']);

Route::get('/refresh_msg/{msg_id}', [ThreadController::class, 'refresh_msg'])->middleware(['auth']);

Route::get('/course/{course_id}/week/{week}/peer_assessment', [StudentCourseController::class, 'peer_assessment'])->middleware(['auth', 'check.course.access', 'check.course.week']);

Route::post('/student/doadd_assessment_answer', [StudentCourseController::class, 'doadd_assessment_answer'])->middleware(['auth']);

Route::get('/course/{course_id}/week/{week}/give_review_assessment/{attempt_id}', [StudentCourseController::class, 'give_review_assessment'])->middleware(['auth', 'check.course.access', 'check.course.week']);

Route::post('/student/doadd_assessment_feedback', [StudentCourseController::class, 'doadd_assessment_feedback'])->middleware(['auth']);

Route::get('check_retake/{topic_id}', [StudentCourseController::class, 'check_retake'])->middleware(['auth']);



Route::get('/grades', function () {
    return view('student.grades');
});

Route::get('/notes', function () {
    return view('student.notes');
});

Route::get('/forums', function () {
    return view('student.forums	');
});

Route::get('/messages', function () {
    return view('student.messages');
});


Route::get('/resources', function () {
    return view('student.resources');
});

Route::get('/course_info', function () {
    return view('student.course_info');
});

Route::get('/week1', function () {
    return view('student.week1');
});

Route::get('/week2', function () {
    return view('student.week2');
});

Route::get('/week3', function () {
    return view('student.week3');
});

Route::get('/week4', function () {
    return view('student.week4');
});


Route::get('/grade_week1', function () {
    return view('student.week1');
});

Route::get('/grades_week2', function () {
    return view('student.week2');
});

Route::get('/grades_week3', function () {
    return view('student.week3');
});

Route::get('/grades_week4', function () {
    return view('student.week4');
});


Route::get('/notes_week1', function () {
    return view('student.week1');
});

Route::get('/notes_week2', function () {
    return view('student.week2');
});

Route::get('/notes_week3', function () {
    return view('student.week3');
});

Route::get('/notes_week4', function () {
    return view('student.week4');
});


Route::get('/notes_week1', function () {
    return view('student.week1');
});

Route::get('/notes_week2', function () {
    return view('student.week2');
});

Route::get('/notes_week3', function () {
    return view('student.week3');
});

Route::get('/notes_week4', function () {
    return view('student.week4');
});


Route::get('/forums_week1', function () {
    return view('student.week1');
});

Route::get('/forums_week2', function () {
    return view('student.week2');
});

Route::get('/forums_week3', function () {
    return view('student.week3');
});

Route::get('/forums_week4', function () {
    return view('student.week4');
});


Route::get('/messages_week1', function () {
    return view('student.week1');
});

Route::get('/messages_week2', function () {
    return view('student.week2');
});

Route::get('/messages_week3', function () {
    return view('student.week3');
});

Route::get('/messages_week4', function () {
    return view('student.week4');
});


Route::get('/resources_week1', function () {
    return view('student.week1');
});

Route::get('/resources_week2', function () {
    return view('student.week2');
});

Route::get('/resources_week3', function () {
    return view('student.week3');
});

Route::get('/resources_week4', function () {
    return view('student.week4');
});


Route::get('/course_info_week1', function () {
    return view('student.week1');
});

Route::get('/course_info_week2', function () {
    return view('student.week2');
});

Route::get('/course_info_week3', function () {
    return view('student.week3');
});

Route::get('/course_info_week4', function () {
    return view('student.week4');
});

Route::get('/admin', function () {
    return view('admin.login');
});

Route::post('admin/login', [AuthController::class, 'admin_login']);

Route::get('admin/logout', [AuthController::class, 'admin_logout']);

// Route::get('admin/home', function () {
//     return view('admin.home');
// })->middleware('auth.admin');

Route::get('admin/home', [CourseController::class, 'adminhome']);

Route::get('admin/add_course', function () {
    return view('admin.add_course');
})->middleware('auth.admin');

Route::post('admin/doaddcourse', [CourseController::class, 'doaddcourse'])->middleware('auth.admin');

Route::get('admin/view_added_courses', [CourseController::class, 'view_added_courses'])->middleware('auth.admin');

Route::post('admin/delcource', [CourseController::class, 'delcource'])->middleware('auth.admin');

Route::get('admin/view_added_courses/edit_course/{id}', [CourseController::class, 'edit_course'])->middleware('auth.admin');

Route::post('/admin/doeditcourse', [CourseController::class, 'doeditcourse'])->middleware('auth.admin');

Route::get('/admin/view_students_requests', [CourseController::class, 'view_students_requests'])->middleware('auth.admin');

Route::post('/admin/approve_reject_request_cource', [CourseController::class, 'approve_reject_request_cource'])->middleware('auth.admin');

Route::get('/admin/assign_courses_to_students', [CourseController::class, 'assign_courses_to_students'])->middleware('auth.admin');

Route::get('/admin/assign_courses_to_students/view_added_students/{id}', [CourseController::class, 'view_added_students'])->middleware('auth.admin');

Route::post('/admin/remove_student_from_cource', [CourseController::class, 'remove_student_from_cource'])->middleware('auth.admin');

Route::get('/admin/assign_courses_to_students/students/{id}', [CourseController::class, 'add_students_to_course'])->middleware('auth.admin');

Route::post('/admin/seleted_students_add_to_course', [CourseController::class, 'seleted_students_add_to_course'])->middleware('auth.admin');

Route::get('/admin/assign_courses_to_teachers', [CourseController::class, 'assign_courses_to_teachers'])->middleware('auth.admin');

Route::get('/admin/assign_courses_to_teachers/view_added_teachers/{id}', [CourseController::class, 'view_added_teachers'])->middleware('auth.admin');

Route::post('/admin/remove_teacher_from_cource', [CourseController::class, 'remove_teacher_from_cource'])->middleware('auth.admin');

Route::get('/admin/assign_courses_to_teachers/teachers/{id}', [CourseController::class, 'add_teachers_to_course'])->middleware('auth.admin');

Route::post('/admin/selected_teachers_add_to_course', [CourseController::class, 'selected_teachers_add_to_course'])->middleware('auth.admin');

Route::get('/admin/users', [UsersController::class, 'view_users'])->middleware('auth.admin');

Route::post('/admin/deluser', [UsersController::class, 'delete_user'])->middleware('auth.admin');

Route::get('/admin/users/{role}', [UsersController::class, 'view_users'])->middleware('auth.admin');

Route::get('/admin/add-user', [UsersController::class, 'add_user'])->middleware('auth.admin');

Route::post('/admin/doadduser', [UsersController::class, 'doadduser'])->middleware('auth.admin');

Route::get('/admin/users/edit-user/{id}', [UsersController::class, 'edit_users'])->middleware('auth.admin');

Route::post('/admin/doedituser', [UsersController::class, 'doedituser'])->middleware('auth.admin');

Route::get('/admin/pending-users', [UsersController::class, 'pending_users'])->middleware('auth.admin');

Route::post('/admin/approve_reject_user', [UsersController::class, 'approve_reject_user'])->middleware('auth.admin');

Route::get('/admin/view_added_courses/view_weeks/{id}', [CourseController::class, 'admin_view_weeks'])->middleware('auth.admin');

Route::post('/admin/view_added_courses/view_weeks/add_week', [CourseController::class, 'admin_add_weeks'])->middleware('auth.admin');

Route::get('/admin/view_added_courses/view_weeks/{id}/{week_id}', [CourseController::class, 'admin_view_weeks'])->middleware('auth.admin');

Route::post('/admin/view_added_courses/view_weeks/update_week', [CourseController::class, 'admin_update_week'])->middleware('auth.admin');

Route::post('/admin/view_added_courses/view_weeks/delete_week', [CourseController::class, 'admin_delete_week'])->middleware('auth.admin');

Route::get('/admin/view_added_courses/view_topics/{course_id}/{week_id}', [CourseController::class, 'admin_view_topics'])->middleware('auth.admin');

Route::get('/admin/view_added_courses/view_topic/{topic_id}', [CourseController::class, 'admin_view_topic'])->middleware('auth.admin');

Route::post('/admin/doaddcommenttopic', [CourseController::class, 'admin_doaddcommenttopic'])->middleware('auth.admin');

Route::get('/admin/view_added_courses/reject-topic/{id}', [CourseController::class, 'admin_reject_topic'])->middleware('auth.admin');

Route::get('/admin/view_added_courses/approve-topic/{id}', [CourseController::class, 'admin_approve_topic'])->middleware('auth.admin');

Route::get('/admin/view_added_courses/edit-topic/{id}', [CourseController::class, 'admin_edit_topic'])->middleware('auth.admin');

Route::post('admin/doupdate_topic', [CourseController::class, 'admin_doupdate_topic'])->middleware('auth.admin');

Route::get('admin/quiz_result', [QuizResultController::class, 'quiz_result'])->middleware('auth.admin');

Route::get('admin/view_added_courses/edit_quiz/{id}', [CourseController::class, 'admin_edit_quiz'])->middleware('auth.admin');

Route::get('admin/view_added_courses/delete_quiz_question/{topic_id}/{q_id}', [CourseController::class, 'delete_quiz_question'])->middleware('auth.admin');

Route::get('admin/view_added_courses/edit_quiz_question/{topic_id}/{q_id}', [CourseController::class, 'admin_edit_quiz_question'])->middleware('auth.admin');

Route::get('/admin/add_certificate/{course_id}', [CourseController::class, 'addcertificate'])->middleware('auth.admin');

Route::get('/admin/view_courses_certificate', [CourseController::class, 'view_courses_certificate'])->middleware('auth.admin');

Route::post('/admin/doaddcertificate', [CourseController::class, 'doaddcertificate'])->middleware('auth.admin');

Route::get('/admin/addinstructorsignature', function () {
    return view('admin.add_signature');
})->middleware('auth.admin');

Route::post('/admin/doaddinstructorsignature', [CourseController::class, 'doaddinstructorsignature'])->middleware('auth.admin');

Route::get('teacher/home', function () {
    return view('teacher.home');
})->middleware('auth.teacher');

Route::get('/show_certificate', [CourseController::class, 'showcoursescertificate'])->middleware('auth.teacher');

Route::get('/teacher/view_courses', [CourseController::class, 'teacher_view_courses'])->middleware('auth.teacher');

Route::get('/teacher/view_courses/view_weeks/{id}', [CourseController::class, 'teacher_view_weeks'])->middleware(['auth.teacher', 'check.course.access']);

Route::get('/teacher/view_courses/view_topics/{id}/{week_id}', [CourseController::class, 'teacher_view_topics'])->middleware(['auth.teacher', 'check.course.access', 'check.week.access']);

Route::get('/teacher/view_courses/view_topics/add_topic/{id}/{week_id}', [CourseController::class, 'teacher_add_topic'])->middleware(['auth.teacher', 'check.course.access', 'check.week.access']);

Route::post('teacher/doadd_topic', [CourseController::class, 'teacher_doadd_topic'])->middleware('auth.teacher');

Route::get('/teacher/view_courses/view_topics/add_final_quiz/{id}/{week_id}', [CourseController::class, 'addfinalquiz']);

Route::post('/teacher/doadd_final_quiz', [CourseController::class, 'doadd_final_quiz'])->middleware('auth.teacher');

// Route::post('teacher/doadd_question', [CourseController::class,'teacher_doadd_topic'])->middleware('auth.teacher');

Route::get('/teacher/view_courses/view_topic/{topic_id}', [CourseController::class, 'teacher_view_topic'])->middleware(['auth.teacher', 'check.topic.access']);

Route::get('/teacher/view_courses/edit_topic/{topic_id}', [CourseController::class, 'teacher_edit_topic'])->middleware(['auth.teacher', 'check.topic.access']);

Route::post('/teacher/dodeletetopicdata', [CourseController::class, 'teacher_dodeletetopicdata']);

Route::post('teacher/doupdate_topic', [CourseController::class, 'teacher_doupdate_topic'])->middleware('auth.teacher');

Route::get('/teacher/view_courses/topic-send-for-approval/{topic_id}', [CourseController::class, 'teacher_topic_send_for_approval'])->middleware(['auth.teacher', 'check.topic.access']);

// Haseeb

Route::get('/teacher/view_courses/view_topics/add_discussion/{id}/{week_id}', [CourseController::class, 'teacher_add_discussion'])->middleware(['auth.teacher', 'check.course.access', 'check.week.access']);

Route::get('/teacher/edit_discussion/{course_id}/{week_id}', [CourseController::class, 'teacher_edit_discussion'])->middleware(['auth.teacher']);

Route::patch('teacher/doupdate_discussion/{id}', [CourseController::class, 'teacher_doupdate_discussion'])->middleware('auth.teacher');

Route::post('teacher/doadd_discussion', [CourseController::class, 'teacher_doadd_discussion'])->middleware('auth.teacher');

Route::get('teacher/view_forums', [ThreadController::class, 'all_forums_teacher'])->middleware('auth.teacher');

Route::get('teacher/discussion/{thread_id}', [ThreadController::class, 'get_discussion_teacher'])->middleware(['auth.teacher']);

Route::post('teacher/add_qurey', [ThreadController::class, 'add_teacher_qurey'])->middleware(['auth.teacher']);

Route::get('teacher/dis_refresh/{thread_id}', [ThreadController::class, 'refresh_teacher_thread'])->middleware(['auth.teacher']);

Route::get('teacher/view_thread/{msg_id}', [ThreadController::class, 'get_teacher_msg'])->middleware(['auth.teacher']);

Route::get('teacher/refresh_msg/{msg_id}', [ThreadController::class, 'refresh_teacher_msg'])->middleware(['auth.teacher']);

Route::post('teacher/add_reply', [ThreadController::class, 'add_teacher_reply'])->middleware(['auth.teacher']);

Route::get('/teacher/view_courses/view_topics/add_assessment/{course_id}/{week_id}', [CourseController::class, 'add_assessment'])->middleware(['auth.teacher']);

Route::post('teacher/doadd_assessment', [CourseController::class, 'teacher_doadd_assessment'])->middleware('auth.teacher');

Route::patch('teacher/doupdate_assessment/{id}', [CourseController::class, 'teacher_doupdate_assessment'])->middleware('auth.teacher');

Route::get('/teacher/view_courses/view_topics/edit_assessment/{course_id}/{week_id}', [CourseController::class, 'edit_assessment'])->middleware(['auth.teacher']);

Route::post('teacher/doedit_assessment', [CourseController::class, 'teacher_doedit_assessment'])->middleware('auth.teacher');

Route::get('/teacher/view_assessments', [CourseController::class, 'view_assessments'])->middleware(['auth.teacher']);

Route::get('/teacher/view_assessments/students/{assessment_id}', [CourseController::class, 'get_students_by_assessment'])->middleware(['auth.teacher']);

Route::get('/teacher/view_assessments/student_feedback/{attempt_id}', [CourseController::class, 'get_student_feedback'])->middleware(['auth.teacher']);

Route::get('teacher/view_courses/edit_quiz/{topic_id}', [CourseController::class, 'edit_quiz'])->middleware(['auth.teacher', 'check.topic.access']);

//teacher/view_courses/edit_question/{id}

Route::get('teacher/view_courses/edit_quiz_question/{topic_id}/{q_id}', [CourseController::class, 'edit_quiz_question'])->middleware(['auth.teacher', 'check.topic.access']);

Route::get('teacher/view_courses/delete_quiz_question/{topic_id}/{q_id}', [CourseController::class, 'delete_quiz_question'])->middleware(['auth.teacher', 'check.topic.access']);

Route::post('do_update_quiz_question', [CourseController::class, 'do_update_quiz_question']);

Route::post('doupdate_quiz_time', [CourseController::class, 'doupdate_quiz_time']);
