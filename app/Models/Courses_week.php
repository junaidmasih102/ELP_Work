<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses_week extends Model
{
    public function topics()
    {
        return $this->hasMany(Topics::class, 'week_id')->where('status', 'A')->with('topics_data');
    }

    static function get_course_weeks($course_id)
    {

       
        return Courses_week::where('course_id', '=', $course_id)->where('status', '=', 1)->get();
    }
}
