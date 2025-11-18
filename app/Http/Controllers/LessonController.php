<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\UserLesson;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user->initializeProgress();
        
        $currentLevel = $user->currentLevel;
        
        // Get all published resources instead of lessons
        $resources = Resource::where('is_published', true)
            ->orderBy('week_number', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        
        // Group by week (instead of stage)
        $resourcesByWeek = $resources->groupBy('week_number');

        return view('discipleship.lessons.index', compact(
            'resourcesByWeek',
            'currentLevel',
            'user',
            'resources'
        ));
    }

    public function completeResource(Request $request, Resource $resource)
{
    $user = auth()->user();
    
    // Check if already viewed
    $alreadyViewed = DB::table('resource_views')
        ->where('user_id', $user->id)
        ->where('resource_id', $resource->id)
        ->exists();

    if ($alreadyViewed) {
        return redirect()->route('discipleship.lessons.index')
            ->with('info', 'You already completed this resource!');
    }

    // Mark as viewed
    DB::table('resource_views')->insert([
        'user_id' => $user->id,
        'resource_id' => $resource->id,
        'viewed_at' => now(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Award XP (10 XP per resource)
    $xpReward = 20;
    $user->progress->addXP($xpReward);
    $user->progress->lessons_completed++; // Track as lesson completion
    $user->progress->save();

    return redirect()->route('discipleship.lessons.index')
        ->with('success', '🎉 Resource completed! You earned ' . $xpReward . ' XP!');
}
}