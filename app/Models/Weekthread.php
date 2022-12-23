<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weekthread extends Model
{
    protected $table = 'week_thread';

    static function get_thread_title_by_week($week_id)
    {
        $title = Weekthread::where('week_id', '=', $week_id)->pluck('thread_title')->first();
        if ($title == null) {
            return "No Discussion board in this week.";
        } else {
            return $title;
        }
    }

    static function get_thread_id_by_week($week_id)
    {
        return Weekthread::where('week_id', '=', $week_id)->pluck('thread_id')->first();
    }
}
