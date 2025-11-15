<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discipleship Hub') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Welcome Banner with Spiritual Level -->
            <div class="relative bg-gradient-to-r from-purple-900 via-purple-700 to-purple-600 rounded-2xl overflow-hidden shadow-xl">
                <!-- Decorative Background -->
                <div class="absolute inset-0 opacity-20">
                    <svg class="absolute bottom-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                        <path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,133.3C672,117,768,107,864,122.7C960,139,1056,181,1152,181.3C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                </div>

                <div class="relative px-6 py-8 md:px-10 md:py-12">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="text-4xl">{{ $currentLevel->icon }}</span>
                                <div>
                                    <h1 class="text-3xl md:text-4xl font-bold text-white">
                                        Welcome, {{ $user->name }}!
                                    </h1>
                                    <p class="text-purple-100 text-lg">
                                        {{ $currentLevel->name }} • Level {{ $currentLevel->order }}
                                    </p>
                                </div>
                            </div>
                            <p class="text-purple-100 mb-4">
                                {{ $currentLevel->description }}
                            </p>
                            
                            <!-- Progress Bar -->
                            <div class="bg-white/20 backdrop-blur-sm rounded-full h-3 mb-2 overflow-hidden">
                                <div class="bg-gradient-to-r from-yellow-400 to-yellow-200 h-full transition-all duration-500" 
                                     style="width: {{ $progressPercentage }}%">
                                </div>
                            </div>
                            <div class="flex justify-between text-sm text-purple-100">
                                <span>{{ number_format($progressPercentage, 1) }}% to next level</span>
                                @if($nextLevel)
                                    <span>{{ $xpNeededForNext }} XP needed for {{ $nextLevel->name }}</span>
                                @else
                                    <span>Max Level Achieved! 🏆</span>
                                @endif
                            </div>
                        </div>

                        <!-- Stats Card -->
                        <div class="bg-white/10 backdrop-blur-lg rounded-2xl p-6 border border-white/20 min-w-[280px]">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-white">{{ $user->xp_points }}</div>
                                    <div class="text-purple-200 text-sm">Total XP</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-white">{{ $progress->devotion_streak }}</div>
                                    <div class="text-purple-200 text-sm">Day Streak</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-white">{{ $progress->lessons_completed }}</div>
                                    <div class="text-purple-200 text-sm">Lessons</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl font-bold text-white">{{ $user->badges->count() }}</div>
                                    <div class="text-purple-200 text-sm">Badges</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Today's Devotion -->
                <a href="{{ route('discipleship.devotion') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all p-6 border-l-4 border-blue-600">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        @if($todaysDevotion)
                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Available</span>
                        @endif
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Today's Devotion</h3>
                    @if($todaysDevotion)
                        <p class="text-sm text-gray-600">{{ $todaysDevotion->title }}</p>
                    @else
                        <p class="text-sm text-gray-500 italic">No devotion today</p>
                    @endif
                </a>

                <!-- Journey Map -->
                <a href="{{ route('discipleship.journey-map') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all p-6 border-l-4 border-purple-600">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                        </div>
                        <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full">Level {{ $currentLevel->order }}/7</span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Journey Map</h3>
                    <p class="text-sm text-gray-600">Track your progress</p>
                </a>

                <!-- Lessons -->
                <a href="{{ route('discipleship.lessons.index') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all p-6 border-l-4 border-green-600">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">{{ $nextLessons->count() }} New</span>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Lessons</h3>
                    <p class="text-sm text-gray-600">Continue learning</p>
                </a>

                <!-- Weekly Resources -->
                <a href="{{ route('resources.view') }}" class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all p-6 border-l-4 border-orange-600">
                    <div class="flex items-start justify-between mb-3">
                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-1">Weekly Resources</h3>
                    <p class="text-sm text-gray-600">Teaching materials</p>
                </a>
            </div>

            <!-- Next Lessons -->
            @if($nextLessons->count() > 0)
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900">Continue Your Journey</h2>
                        <a href="{{ route('discipleship.lessons.index') }}" class="text-purple-600 hover:text-purple-700 font-medium text-sm">
                            View All →
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($nextLessons as $lesson)
                            <a href="{{ route('discipleship.lessons.show', $lesson) }}" class="group border-2 border-gray-200 rounded-xl p-4 hover:border-purple-300 hover:shadow-md transition-all">
                                <div class="flex items-start justify-between mb-3">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs font-semibold rounded-full">
                                        {{ $lesson->stage }}
                                    </span>
                                    <span class="text-purple-600 font-bold text-sm">+{{ $lesson->xp_reward }} XP</span>
                                </div>
                                <h3 class="font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">
                                    {{ $lesson->title }}
                                </h3>
                                <p class="text-sm text-gray-600 line-clamp-2">
                                    {{ $lesson->description }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Recent Badges -->
            @if($recentBadges->count() > 0)
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Recent Achievements</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach($recentBadges as $badge)
                            <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-xl p-4 border border-yellow-200">
                                <div class="text-center">
                                    <div class="text-4xl mb-2">{{ $badge->icon ?? '🏆' }}</div>
                                    <h4 class="font-bold text-gray-900 mb-1">{{ $badge->name }}</h4>
                                    <p class="text-xs text-gray-600 mb-2">{{ $badge->description }}</p>
                                    <span class="text-xs text-gray-500">
                                        Earned {{ $badge->pivot->earned_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>