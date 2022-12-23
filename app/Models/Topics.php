<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Topics extends Model
{
    public function topics_data_video()
    {
        return $this->hasMany(Topics_data::class,'topic_id')->where('type',"V")->with('topics_data_seen');
    }
	
    public function topics_data_reading()
    {
        return $this->hasMany(Topics_data::class,'topic_id')->where('type',"R")->with('topics_data_seen');
    }
	
	public function topics_data(){
		return $this->hasMany(Topics_data::class,'topic_id')->with('topics_data_seen');
	}
}
