<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $lesson->title }}
            </h2>
            <a href="{{ route('discipleship.lessons.index') }}" class="text-purple-600 hover:text-purple-700 text-sm font-medium">
                ← Back to Lessons
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Lesson Header -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl p-8 mb-8 shadow-xl text-white">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-sm font-semibold mb-3 inline-block">
                            {{ $lesson->stage }}
                        </span>
                        <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $lesson->title }}</h1>
                        @if($lesson->description)
                            <p class="text-purple-100 text-lg">{{ $lesson->description }}</p>
                        @endif
                    </div>
                    
                    @if(!$isCompleted)
                        <div class="bg-white/10 backdrop-blur-lg rounded-xl p-4 border border-white/20 text-center min-w-[120px]">
                            <div class="text-3xl font-bold">{{ $lesson->xp_reward }}</div>
                            <div class="text-purple-200 text-sm">XP Reward</div>
                        </div>
                    @else
                        <div class="bg-green-500/20 backdrop-blur-lg rounded-xl p-4 border border-green-400/30 text-center">
                            <svg class="w-12 h-12 text-green-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <div class="text-green-100 text-sm font-semibold">Completed!</div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Lesson Content -->
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-6">
                <!-- Video/Audio Section -->
                @if($lesson->video_url || $lesson->audio_url)
                    <div class="mb-8">
                        @if($lesson->video_url)
                            <div class="aspect-video bg-gray-900 rounded-xl overflow-hidden mb-4">
                                <iframe 
                                    src="{{ $lesson->video_url }}" 
                                    class="w-full h-full" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                                </iframe>
                            </div>
                        @endif

                        @if($lesson->audio_url)
                            <div class="bg-gray-50 rounded-xl p-6">
                                <audio controls class="w-full">
                                    <source src="{{ $lesson->audio_url }}" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Text Content -->
                @if($lesson->content)
                    <div class="prose prose-lg max-w-none mb-8">
                        {!! nl2br(e($lesson->content)) !!}
                    </div>
                @endif

                <!-- Quiz Section -->
                @if($lesson->quiz_questions && !$isCompleted)
                    <div class="border-t border-gray-200 pt-8 mt-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Knowledge Check</h2>
                        
                        <form method="POST" action="{{ route('discipleship.lessons.complete', $lesson) }}" id="lessonForm">
                            @csrf
                            
                            <div class="space-y-6">
                                @foreach($lesson->quiz_questions as $index => $question)
                                    <div class="bg-gray-50 rounded-xl p-6">
                                        <h3 class="font-semibold text-gray-900 mb-4">
                                            {{ $index + 1 }}. {{ $question['question'] }}
                                        </h3>
                                        
                                        <div class="space-y-3">
                                            @foreach($question['options'] as $optionIndex => $option)
                                                <label class="flex items-center p-4 bg-white rounded-lg border-2 border-gray-200 hover:border-purple-300 cursor-pointer transition-all">
                                                    <input 
                                                        type="radio" 
                                                        name="quiz_answers[{{ $index }}]" 
                                                        value="{{ $optionIndex }}" 
                                                        class="w-5 h-5 text-purple-600 focus:ring-purple-500"
                                                        required
                                                    >
                                                    <span class="ml-3 text-gray-700">{{ $option }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Reflection -->
                            <div class="mt-8 bg-blue-50 rounded-xl p-6 border border-blue-200">
                                <label for="reflection" class="block text-lg font-semibold text-gray-900 mb-3">
                                    Personal Reflection (Optional)
                                </label>
                                <p class="text-sm text-gray-600 mb-3">
                                    What is one key insight you gained from this lesson? How will you apply it?
                                </p>
                                <textarea 
                                    name="reflection" 
                                    id="reflection" 
                                    rows="4" 
                                    class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="Share your thoughts..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-8 flex items-center justify-between">
                                <a href="{{ route('discipleship.lessons.index') }}" class="text-gray-600 hover:text-gray-700 font-medium">
                                    ← Back to Lessons
                                </a>
                                <button 
                                    type="submit" 
                                    class="px-8 py-3 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-xl font-bold transition-all shadow-lg hover:shadow-xl">
                                    Complete Lesson & Earn {{ $lesson->xp_reward }} XP
                                </button>
                            </div>
                        </form>
                    </div>
                @elseif(!$lesson->quiz_questions && !$isCompleted)
                    <!-- No Quiz - Simple Completion -->
                    <div class="border-t border-gray-200 pt-8 mt-8">
                        <form method="POST" action="{{ route('discipleship.lessons.complete', $lesson) }}">
                            @csrf
                            
                            <!-- Reflection -->
                            <div class="bg-blue-50 rounded-xl p-6 border border-blue-200 mb-6">
                                <label for="reflection" class="block text-lg font-semibold text-gray-900 mb-3">
                                    Personal Reflection (Optional)
                                </label>
                                <p class="text-sm text-gray-600 mb-3">
                                    What is one key insight you gained from this lesson? How will you apply it?
                                </p>
                                <textarea 
                                    name="reflection" 
                                    id="reflection" 
                                    rows="4" 
                                    class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500"
                                    placeholder="Share your thoughts..."></textarea>
                            </div>

                            <div class="flex items-center justify-between">
                                <a href="{{ route('discipleship.lessons.index') }}" class="text-gray-600 hover:text-gray-700 font-medium">
                                    ← Back to Lessons
                                </a>
                                <button 
                                    type="submit" 
                                    class="px-8 py-3 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-xl font-bold transition-all shadow-lg hover:shadow-xl">
                                    Complete Lesson & Earn {{ $lesson->xp_reward }} XP
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <!-- Already Completed -->
                    <div class="border-t border-gray-200 pt-8 mt-8">
                        <div class="bg-green-50 rounded-xl p-6 border border-green-200 text-center">
                            <svg class="w-16 h-16 text-green-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Lesson Completed!</h3>
                            <p class="text-gray-600 mb-1">Completed on {{ $userLesson->completed_at->format('F j, Y') }}</p>
                            
                            @if($userLesson->quiz_score)
                                <p class="text-gray-600">Quiz Score: {{ number_format($userLesson->quiz_score, 0) }}%</p>
                            @endif

                            @if($userLesson->reflection)
                                <div class="mt-6 bg-white rounded-lg p-4 text-left">
                                    <h4 class="font-semibold text-gray-900 mb-2">Your Reflection:</h4>
                                    <p class="text-gray-700">{{ $userLesson->reflection }}</p>
                                </div>
                            @endif
                        </div>

                        <div class="mt-6 text-center">
                            <a href="{{ route('discipleship.lessons.index') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold transition-all">
                                Continue to Next Lesson
                            </a>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>