<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'is_completed',
        'started_at',
        'completed_at',
        'quiz_score',
        'reflection',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    // Mark lesson as complete
    public function complete($quizScore = null, $reflection = null)
    {
        $this->is_completed = true;
        $this->completed_at = now();
        
        if ($quizScore !== null) {
            $this->quiz_score = $quizScore;
        }
        
        if ($reflection) {
            $this->reflection = $reflection;
        }
        
        $this->save();

        // Award XP
        $this->user->progress->addXP($this->lesson->xp_reward);
        $this->user->progress->lessons_completed++;
        $this->user->progress->save();

        // Check for badges
        $this->checkBadges();
    }

    private function checkBadges()
    {
        // Award "First Lesson" badge
        if ($this->user->progress->lessons_completed == 1) {
            $badge = Badge::where('category', 'lesson')->where('name', 'First Steps')->first();
            if ($badge) {
                $badge->awardTo($this->user);
            }
        }

        // Award "Scripture Scholar" badge for 10 lessons
        if ($this->user->progress->lessons_completed == 10) {
            $badge = Badge::where('category', 'lesson')->where('name', 'Scripture Scholar')->first();
            if ($badge) {
                $badge->awardTo($this->user);
            }
        }
    }
}