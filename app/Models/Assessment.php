<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Assessment extends Model
{
    static function get_answers($qst_id, $std_id)
    {
        $answers = DB::table('assessment_answers')->where('question_id', $qst_id)->where('answer_by', $std_id)->select('answer')->first();
        return $answers->answer;
        // return "Question id is : $qst_id, and Student id is : $std_id";
    }

    static function get_assessment_by_week($week_id)
    {
        $assessment = DB::table('assessment')->where('create_by', Session::get('user')['id'])->where('week_id', $week_id)->pluck('asessment_title')->first();
        if($assessment == null)
        {
            return "No Peer Graded Assessment in this Week.";
        }
        else
        {
            return $assessment;
        }
    }

    static function get_total_attempt_by_assessment_id($week_id)
    {
        $assessment_id = DB::table('assessment')->where('create_by', Session::get('user')['id'])->where('week_id', $week_id)->pluck('id')->first();
        $assessment_attempt = DB::table('assessment_attempt')->where('assessment_id', $assessment_id)->get();
        if ($assessment_attempt == null) {
            return "No attempts available right now.";
        }
        else
        {
            return count($assessment_attempt);
        }

    }

    static function get_assessment_id_by_week($week_id)
    {
        $assessment_id = DB::table('assessment')->where('create_by', Session::get('user')['id'])->where('week_id', $week_id)->pluck('id')->first();
        if ($assessment_id == null) {
            return "";
        }
        else
        {
            return $assessment_id;
        }
    }

    static function get_count_of_feedback($assessment_id, $std_id)
    {
        $feedback_count = DB::table('assessment_feedbacks')->where('assessment_id', $assessment_id)->where('answer_by', $std_id)->get();
        if ($feedback_count == null) {
            return "0";
        }
        else
        {
            return count($feedback_count);
        }
    }

    static function get_points($qst_id)
    {
        $points = DB::table('assessment_point')->where('question_id', $qst_id)->get();
        if ($points == null) {
            return "";
        }
        else
        {
            return $points;
        }
    }

    static function get_percentage($std_id, $feedback_by, $assessment_id)
    {
        $points = DB::select("SELECT SUM(max_) as total_point FROM (SELECT MAX(point) AS max_ FROM `assessment_point` WHERE assessment_point.assessment_id = $assessment_id GROUP BY `question_id`) s;");

        $feedback = DB::table('assessment_feedbacks')
                        ->join('users', 'users.id', 'assessment_feedbacks.feedback_by')
                        ->where('answer_by', $std_id)
                        ->where('feedback_by', $feedback_by)
                        ->where('assessment_id', $assessment_id)
                        ->get();
        $obtain_points = 0;
        foreach ($feedback as $key => $value) {
            $obtain_points += $value->point;
        }
        $total_points =  $points[0]->total_point;
        $percentage = $obtain_points / (int)$total_points * 100;

        if ($percentage == null) {
            return "";
        }
        else
        {
            return number_format((float)$percentage, 2, '.', '');
        }
    }

    static function get_other_feedbacks($feedback_by, $assessment_id)
    {
        $points = DB::select("SELECT SUM(max_) as total_point FROM (SELECT MAX(point) AS max_ FROM `assessment_point` WHERE assessment_point.assessment_id = $assessment_id GROUP BY `question_id`) s;");

        $feedback = DB::table('assessment_feedbacks')
                        ->join('users', 'users.id', 'assessment_feedbacks.feedback_by')
                        ->where('answer_by', Session::get('user')['id'])
                        ->where('feedback_by', $feedback_by)
                        ->where('assessment_id', $assessment_id)
                        ->get();
        $obtain_points = 0;
        foreach ($feedback as $key => $value) {
            $obtain_points += $value->point;
        }
        $total_points =  $points[0]->total_point;
        $percentage = $obtain_points / (int)$total_points * 100;

        if ($percentage == null) {
            return "";
        }
        else
        {
            return number_format((float)$percentage, 2, '.', '');
        }
    }
}
