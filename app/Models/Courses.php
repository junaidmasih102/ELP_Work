<?php

namespace App\Models;

use App\Http\Middleware\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;


class Courses extends Model
{
    use HasFactory;

    // public function students_courses()
    // {
    //     // return $this->hasOne(Students_courses::class, 'course_id')->where('user_id', Session::get('user')['id']);
    //     return $this->hasOne(Students_courses::class, 'course_id')->where('user_id', ['id']);
    // }

    public function students_courses()
    {
        if (auth()->user()) {
            return $this->hasOne(Students_courses::class, 'course_id')->where('user_id', Session::get('user')['id']);
        } else {
            return $this->hasOne(Students_courses::class, 'course_id')->where('user_id', ['id']);
        }
    }
}
