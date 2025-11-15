<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'spiritual_level_id',
        'xp_points',
        'devotion_streak',
        'last_devotion_date',
        'lessons_completed',
        'quests_completed',
    ];

    protected $casts = [
        'last_devotion_date' => 'date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spiritualLevel()
    {
        return $this->belongsTo(SpiritualLevel::class);
    }

    // Helper methods
    public function addXP($points)
    {
        $this->xp_points += $points;
        $this->user->xp_points += $points;
        $this->user->save();
        
        // Check for level up
        $this->checkLevelUp();
        $this->save();
    }

    public function checkLevelUp()
    {
        $nextLevel = SpiritualLevel::where('xp_required', '<=', $this->xp_points)
            ->orderBy('xp_required', 'desc')
            ->first();

        if ($nextLevel && $nextLevel->id !== $this->spiritual_level_id) {
            $this->spiritual_level_id = $nextLevel->id;
            $this->user->current_level_id = $nextLevel->id;
            $this->user->save();
            return $nextLevel;
        }

        return null;
    }

    public function updateDevotionStreak()
    {
        $today = Carbon::today();
        
        if ($this->last_devotion_date) {
            $daysSinceLastDevotion = $this->last_devotion_date->diffInDays($today);
            
            if ($daysSinceLastDevotion == 1) {
                // Continue streak
                $this->devotion_streak++;
            } elseif ($daysSinceLastDevotion > 1) {
                // Streak broken
                $this->devotion_streak = 1;
            }
            // If same day, don't change streak
        } else {
            // First devotion
            $this->devotion_streak = 1;
        }
        
        $this->last_devotion_date = $today;
        $this->save();
    }

    public function getProgressPercentage()
    {
        $nextLevel = $this->spiritualLevel->getNextLevel();
        
        if (!$nextLevel) {
            return 100; // Max level reached
        }

        $currentLevelXP = $this->spiritualLevel->xp_required;
        $nextLevelXP = $nextLevel->xp_required;
        $userXP = $this->xp_points;

        $xpInCurrentLevel = $userXP - $currentLevelXP;
        $xpNeededForNextLevel = $nextLevelXP - $currentLevelXP;

        return min(100, ($xpInCurrentLevel / $xpNeededForNextLevel) * 100);
    }
}