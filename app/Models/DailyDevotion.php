<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class DailyDevotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'title',
        'scripture_reference',
        'content',
        'reflection_question',
        'prayer_point',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    // Get today's devotion
    public static function today()
    {
        return self::whereDate('date', Carbon::today())->first();
    }

    // Get devotion for a specific date
    public static function forDate($date)
    {
        return self::whereDate('date', $date)->first();
    }
}