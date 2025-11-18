<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'xp_points',
        'current_level_id',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    public function currentLevel()
    {
        return $this->belongsTo(SpiritualLevel::class, 'current_level_id');
    }

    public function progress()
    {
        return $this->hasOne(UserProgress::class);
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'user_badges')
            ->withPivot('earned_at')
            ->withTimestamps();
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class, 'user_lessons')
            ->withPivot('is_completed', 'started_at', 'completed_at', 'quiz_score', 'reflection')
            ->withTimestamps();
    }

    public function userLessons()
    {
        return $this->hasMany(UserLesson::class);
    }

    // Helper Methods
    public function initializeProgress()
{
    if (!$this->progress) {
        $firstLevel = SpiritualLevel::orderBy('order')->first();
        
        if ($firstLevel) {
            UserProgress::create([
                'user_id' => $this->id,
                'spiritual_level_id' => $firstLevel->id,
                'xp_points' => 0,
                'devotion_streak' => 0,
                'lessons_completed' => 0,
                'quests_completed' => 0,
            ]);

            $this->current_level_id = $firstLevel->id;
            $this->save();
        }
    }
}

    public function getProgressPercentage()
    {
        return $this->progress ? $this->progress->getProgressPercentage() : 0;
    }

    public function hasCompletedLesson($lessonId)
    {
        return $this->userLessons()
            ->where('lesson_id', $lessonId)
            ->where('is_completed', true)
            ->exists();
    }
}
