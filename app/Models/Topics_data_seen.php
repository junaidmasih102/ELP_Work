<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics_data_seen extends Model
{
    public $table = "topics_data_seen";
	
    public function topics()
    {
        return $this->belongsTo(Topics_data::class);
    }
}
