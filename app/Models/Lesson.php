<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'stage',
        'order',
        'spiritual_level_id',
        'content',
        'video_url',
        'audio_url',
        'quiz_questions',
        'xp_reward',
        'is_locked',
        'prerequisite_lesson_id',
        'is_published',
    ];

    protected $casts = [
        'quiz_questions' => 'array',
        'is_locked' => 'boolean',
        'is_published' => 'boolean',
    ];

    // Relationships
    public function spiritualLevel()
    {
        return $this->belongsTo(SpiritualLevel::class);
    }

    public function prerequisite()
    {
        return $this->belongsTo(Lesson::class, 'prerequisite_lesson_id');
    }

    public function dependentLessons()
    {
        return $this->hasMany(Lesson::class, 'prerequisite_lesson_id');
    }

    public function userLessons()
    {
        return $this->hasMany(UserLesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_lessons')
            ->withPivot('is_completed', 'started_at', 'completed_at', 'quiz_score', 'reflection')
            ->withTimestamps();
    }

    // Helper methods
    public function isUnlockedFor(User $user)
    {
        // If not locked, it's available
        if (!$this->is_locked) {
            return true;
        }

        // Check if user's level meets requirement
        if ($user->currentLevel && $user->currentLevel->order < $this->spiritualLevel->order) {
            return false;
        }

        // Check if prerequisite is completed
        if ($this->prerequisite_lesson_id) {
            $prerequisiteCompleted = UserLesson::where('user_id', $user->id)
                ->where('lesson_id', $this->prerequisite_lesson_id)
                ->where('is_completed', true)
                ->exists();

            return $prerequisiteCompleted;
        }

        return true;
    }

    public function isCompletedBy(User $user)
    {
        return UserLesson::where('user_id', $user->id)
            ->where('lesson_id', $this->id)
            ->where('is_completed', true)
            ->exists();
    }
}