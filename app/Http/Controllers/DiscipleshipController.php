<?php

namespace App\Http\Controllers;

use App\Models\DailyDevotion;
use App\Models\SpiritualLevel;
use App\Models\Lesson;
use Illuminate\Http\Request;

class DiscipleshipController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Initialize progress if not exists
        $user->initializeProgress();
        
        $progress = $user->progress;
        $currentLevel = $user->currentLevel;
        $nextLevel = $currentLevel->getNextLevel();
        
        // Get today's devotion
        $todaysDevotion = DailyDevotion::today();
        
        // Get next available lessons
        $nextLessons = Lesson::where('is_published', true)
            ->where('spiritual_level_id', $currentLevel->id)
            ->whereDoesntHave('users', function($query) use ($user) {
                $query->where('user_id', $user->id)
                      ->where('is_completed', true);
            })
            ->orderBy('order')
            ->take(3)
            ->get();
        
        // Get recent badges (last 3)
        $recentBadges = $user->badges()
            ->orderBy('user_badges.earned_at', 'desc')
            ->take(3)
            ->get();
        
        // Calculate progress percentage
        $progressPercentage = $progress->getProgressPercentage();
        
        // XP needed for next level
        $xpNeededForNext = $nextLevel ? ($nextLevel->xp_required - $user->xp_points) : 0;

        return view('discipleship.index', compact(
            'user',
            'progress',
            'currentLevel',
            'nextLevel',
            'todaysDevotion',
            'nextLessons',
            'recentBadges',
            'progressPercentage',
            'xpNeededForNext'
        ));
    }

    public function devotion()
    {
        $user = auth()->user();
        $todaysDevotion = DailyDevotion::today();
        
        if (!$todaysDevotion) {
            return redirect()->route('discipleship.index')
                ->with('info', 'No devotion available for today.');
        }

        return view('discipleship.devotion', compact('todaysDevotion', 'user'));
    }

    public function completeDevot ion()
    {
        $user = auth()->user();
        $progress = $user->progress;
        
        // Update devotion streak
        $progress->updateDevotionStreak();
        
        // Award XP for completing devotion
        $progress->addXP(5);
        
        // Check for devotion streak badges
        $this->checkDevotionBadges($user);

        return redirect()->route('discipleship.index')
            ->with('success', '🎉 Devotion completed! You earned 5 XP. Streak: ' . $progress->devotion_streak . ' days!');
    }

    private function checkDevotionBadges($user)
    {
        $streak = $user->progress->devotion_streak;
        
        // Award badges based on streak
        if ($streak == 7) {
            $badge = \App\Models\Badge::where('name', 'Week Warrior')->first();
            if ($badge) $badge->awardTo($user);
        }
        
        if ($streak == 30) {
            $badge = \App\Models\Badge::where('name', 'Monthly Faithful')->first();
            if ($badge) $badge->awardTo($user);
        }
    }
}