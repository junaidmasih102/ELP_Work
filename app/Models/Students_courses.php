<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students_courses extends Model
{
    //use HasFactory;
	
	public function courses()
    {
        return $this->belongsTo(Courses::class);
    }
}
