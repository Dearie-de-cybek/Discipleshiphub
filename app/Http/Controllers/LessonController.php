<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\UserLesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user->initializeProgress();
        
        $currentLevel = $user->currentLevel;
        
        // Get all published lessons for current level
        $lessons = Lesson::where('is_published', true)
            ->where('spiritual_level_id', $currentLevel->id)
            ->orderBy('stage')
            ->orderBy('order')
            ->get();
        
        // Group by stage
        $lessonsByStage = $lessons->groupBy('stage');

        return view('discipleship.lessons.index', compact(
            'lessonsByStage',
            'currentLevel',
            'user'
        ));
    }

    public function show(Lesson $lesson)
    {
        $user = auth()->user();
        
        // Check if lesson is unlocked
        if (!$lesson->isUnlockedFor($user)) {
            return redirect()->route('discipleship.lessons.index')
                ->with('error', 'This lesson is locked. Complete previous lessons to unlock it.');
        }

        // Get or create user lesson record
        $userLesson = UserLesson::firstOrCreate(
            [
                'user_id' => $user->id,
                'lesson_id' => $lesson->id,
            ],
            [
                'started_at' => now(),
            ]
        );

        $isCompleted = $userLesson->is_completed;

        return view('discipleship.lessons.show', compact('lesson', 'userLesson', 'isCompleted', 'user'));
    }

    public function complete(Request $request, Lesson $lesson)
    {
        $user = auth()->user();
        
        $userLesson = UserLesson::where('user_id', $user->id)
            ->where('lesson_id', $lesson->id)
            ->firstOrFail();

        // Validate quiz if exists
        $quizScore = null;
        if ($lesson->quiz_questions && $request->has('quiz_answers')) {
            $quizScore = $this->calculateQuizScore($lesson->quiz_questions, $request->quiz_answers);
        }

        // Save reflection if provided
        $reflection = $request->input('reflection');

        // Mark as complete
        $userLesson->complete($quizScore, $reflection);

        return redirect()->route('discipleship.lessons.index')
            ->with('success', '🎉 Lesson completed! You earned ' . $lesson->xp_reward . ' XP!');
    }

    private function calculateQuizScore($questions, $answers)
    {
        $correct = 0;
        $total = count($questions);

        foreach ($questions as $index => $question) {
            if (isset($answers[$index]) && $answers[$index] == $question['correct_answer']) {
                $correct++;
            }
        }

        return ($correct / $total) * 100;
    }
}