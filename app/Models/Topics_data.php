<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Topics_data extends Model
{
    public $table = "topics_data";

    public function topics()
    {
        return $this->belongsTo(Topics::class);
    }

    public function topics_data_seen()
    {
        return $this->hasMany(Topics_data_seen::class, 'topics_data_id')->where('user_id', Session::get('user')['id']);
    }
}
