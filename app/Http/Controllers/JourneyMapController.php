<?php

namespace App\Http\Controllers;

use App\Models\SpiritualLevel;
use Illuminate\Http\Request;

class JourneyMapController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user->initializeProgress();
        
        $allLevels = SpiritualLevel::orderBy('order')->get();
        $currentLevel = $user->currentLevel;
        $progress = $user->progress;
        
        // Get stats for each level
        $levelStats = [];
        foreach ($allLevels as $level) {
            $levelStats[$level->id] = [
                'total_lessons' => $level->lessons()->where('is_published', true)->count(),
                'completed_lessons' => $user->userLessons()
                    ->whereHas('lesson', function($query) use ($level) {
                        $query->where('spiritual_level_id', $level->id);
                    })
                    ->where('is_completed', true)
                    ->count(),
                'is_current' => $level->id == $currentLevel->id,
                'is_unlocked' => $level->order <= $currentLevel->order,
                'is_completed' => $level->order < $currentLevel->order,
            ];
        }

        return view('discipleship.journey-map', compact(
            'allLevels',
            'currentLevel',
            'progress',
            'levelStats',
            'user'
        ));
    }
}