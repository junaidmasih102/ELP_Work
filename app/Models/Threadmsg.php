<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threadmsg extends Model
{
    protected $table = 'thread_msg';

    static function get_total_thread_by_week($week_id)
    {
        return count(Threadmsg::where('week_id', '=', $week_id)
                    ->where('reply_to', '=', null)
                    ->join('week_thread', 'week_thread.thread_id', 'thread_msg.thread_id')
                    ->get()
                    );
    }
}