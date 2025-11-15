<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Discipleship Lessons') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-purple-600 hover:text-purple-700 text-sm font-medium">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl p-8 mb-8 shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-4xl">{{ $currentLevel->icon }}</span>
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-1">{{ $currentLevel->name }} Lessons</h1>
                                <p class="text-purple-100">Level {{ $currentLevel->order }} • {{ $currentLevel->description }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-4 border border-white/20 text-center min-w-[150px]">
                        <div class="text-3xl font-bold text-white">{{ $user->progress->lessons_completed }}</div>
                        <div class="text-purple-200 text-sm">Lessons Completed</div>
                    </div>
                </div>
            </div>

            <!-- Lessons by Stage -->
            @if($lessonsByStage->count() > 0)
                <div class="space-y-6">
                    @foreach($lessonsByStage as $stage => $stageLessons)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <!-- Stage Header -->
                            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2 class="text-2xl font-bold text-white">{{ $stage }}</h2>
                                        <p class="text-green-100 text-sm">{{ $stageLessons->count() }} {{ Str::plural('lesson', $stageLessons->count()) }}</p>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                                        <span class="text-white font-semibold">
                                            {{ $stageLessons->where(fn($l) => $user->hasCompletedLesson($l->id))->count() }} / {{ $stageLessons->count() }} Complete
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Lessons Grid -->
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($stageLessons as $lesson)
                                        @php
                                            $isUnlocked = $lesson->isUnlockedFor($user);
                                            $isCompleted = $lesson->isCompletedBy($user);
                                        @endphp

                                        <div class="group border-2 {{ $isCompleted ? 'border-green-300 bg-green-50' : ($isUnlocked ? 'border-gray-200 hover:border-purple-300' : 'border-gray-200 bg-gray-50') }} rounded-xl p-5 transition-all {{ $isUnlocked ? 'hover:shadow-md' : 'opacity-75' }}">
                                            <!-- Status & XP -->
                                            <div class="flex items-start justify-between mb-3">
                                                <div>
                                                    @if($isCompleted)
                                                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full flex items-center gap-1">
                                                            ✓ Completed
                                                        </span>
                                                    @elseif($isUnlocked)
                                                        <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">
                                                            Available
                                                        </span>
                                                    @else
                                                        <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-full flex items-center gap-1">
                                                            🔒 Locked
                                                        </span>
                                                    @endif
                                                </div>
                                                @if($isUnlocked && !$isCompleted)
                                                    <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs font-bold rounded-full">
                                                        +{{ $lesson->xp_reward }} XP
                                                    </span>
                                                @endif
                                            </div>

                                            <!-- Lesson Icon -->
                                            <div class="w-14 h-14 bg-gradient-to-br {{ $isCompleted ? 'from-green-100 to-green-200' : 'from-purple-100 to-purple-200' }} rounded-xl flex items-center justify-center mb-3">
                                                @if($isCompleted)
                                                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                @else
                                                    <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                    </svg>
                                                @endif
                                            </div>

                                            <!-- Title & Description -->
                                            <h3 class="font-bold text-gray-900 mb-2 line-clamp-2 {{ $isUnlocked ? 'group-hover:text-purple-600' : '' }} transition-colors">
                                                {{ $lesson->title }}
                                            </h3>
                                            
                                            @if($lesson->description)
                                                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                                    {{ $lesson->description }}
                                                </p>
                                            @endif

                                            <!-- Action Button -->
                                            <div class="pt-3 border-t border-gray-100">
                                                @if($isCompleted)
                                                    <a href="{{ route('discipleship.lessons.show', $lesson) }}" 
                                                       class="inline-flex items-center text-green-600 hover:text-green-700 font-medium text-sm">
                                                        Review Lesson →
                                                    </a>
                                                @elseif($isUnlocked)
                                                    <a href="{{ route('discipleship.lessons.show', $lesson) }}" 
                                                       class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium text-sm transition-all">
                                                        Start Lesson →
                                                    </a>
                                                @else
                                                    <div class="flex items-center text-gray-500 text-sm">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                                        </svg>
                                                        Complete previous lessons
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Media Indicators -->
                                            @if($lesson->video_url || $lesson->audio_url)
                                                <div class="flex items-center gap-2 mt-3 pt-3 border-t border-gray-100">
                                                    @if($lesson->video_url)
                                                        <span class="text-xs text-gray-500 flex items-center gap-1">
                                                            🎥 Video
                                                        </span>
                                                    @endif
                                                    @if($lesson->audio_url)
                                                        <span class="text-xs text-gray-500 flex items-center gap-1">
                                                            🎵 Audio
                                                        </span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-2xl shadow-lg p-16 text-center">
                    <div class="w-24 h-24 bg-purple-100 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">No Lessons Available Yet</h3>
                    <p class="text-gray-600 text-lg mb-8">
                        Lessons for your current level will be published soon.
                    </p>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold transition-all">
                        Back to Dashboard
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>