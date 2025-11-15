<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Journey Map') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl p-8 mb-8 shadow-xl text-white">
                <h1 class="text-3xl font-bold mb-2">Your Spiritual Journey</h1>
                <p class="text-purple-100">From Seeker to Ambassador - Track your growth in Christ</p>
            </div>

            <!-- Journey Path -->
            <div class="space-y-6">
                @foreach($allLevels as $index => $level)
                    @php
                        $stats = $levelStats[$level->id];
                        $isUnlocked = $stats['is_unlocked'];
                        $isCurrent = $stats['is_current'];
                        $isCompleted = $stats['is_completed'];
                    @endphp

                    <div class="relative">
                        <!-- Connecting Line (except for last item) -->
                        @if(!$loop->last)
                            <div class="absolute left-8 top-20 w-1 h-full {{ $isCompleted ? 'bg-green-500' : 'bg-gray-300' }} ml-4"></div>
                        @endif

                        <!-- Level Card -->
                        <div class="relative bg-white rounded-2xl shadow-lg overflow-hidden {{ $isCurrent ? 'ring-4 ring-purple-500' : '' }}">
                            <div class="p-6">
                                <div class="flex items-start gap-6">
                                    <!-- Icon & Status -->
                                    <div class="flex-shrink-0">
                                        <div class="w-20 h-20 rounded-2xl flex items-center justify-center text-4xl {{ 
                                            $isCompleted ? 'bg-green-100' : 
                                            ($isCurrent ? 'bg-purple-100' : 
                                            ($isUnlocked ? 'bg-blue-100' : 'bg-gray-100'))
                                        }}">
                                            @if($isCompleted)
                                                ✅
                                            @else
                                                {{ $level->icon }}
                                            @endif
                                        </div>
                                        
                                        <!-- Status Badge -->
                                        <div class="text-center mt-2">
                                            @if($isCompleted)
                                                <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">Completed</span>
                                            @elseif($isCurrent)
                                                <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-bold rounded-full">Current</span>
                                            @elseif($isUnlocked)
                                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full">Unlocked</span>
                                            @else
                                                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-bold rounded-full">🔒 Locked</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Content -->
                                    <div class="flex-1">
                                        <div class="flex items-center justify-between mb-2">
                                            <div>
                                                <h3 class="text-2xl font-bold text-gray-900">{{ $level->name }}</h3>
                                                <p class="text-sm text-gray-500">Level {{ $level->order }} • {{ $level->xp_required }} XP Required</p>
                                            </div>
                                            @if($isCurrent)
                                                <div class="text-right">
                                                    <div class="text-2xl font-bold text-purple-600">{{ $progress->xp_points }} XP</div>
                                                    <div class="text-sm text-gray-600">Your Progress</div>
                                                </div>
                                            @endif
                                        </div>

                                        <p class="text-gray-600 mb-4">{{ $level->description }}</p>

                                        <!-- Lessons Progress -->
                                        @if($isUnlocked)
                                            <div class="bg-gray-50 rounded-lg p-4">
                                                <div class="flex items-center justify-between mb-2">
                                                    <span class="text-sm font-medium text-gray-700">Lessons Progress</span>
                                                    <span class="text-sm text-gray-600">{{ $stats['completed_lessons'] }} / {{ $stats['total_lessons'] }}</span>
                                                </div>
                                                
                                                @if($stats['total_lessons'] > 0)
                                                    <div class="bg-gray-200 rounded-full h-2 overflow-hidden">
                                                        <div class="bg-gradient-to-r from-purple-600 to-purple-500 h-full transition-all" 
                                                             style="width: {{ ($stats['completed_lessons'] / $stats['total_lessons']) * 100 }}%">
                                                        </div>
                                                    </div>
                                                @else
                                                    <p class="text-sm text-gray-500 italic">No lessons available yet</p>
                                                @endif

                                                @if($isCurrent && $stats['total_lessons'] > 0)
                                                    <a href="{{ route('discipleship.lessons.index') }}" class="inline-flex items-center mt-3 text-purple-600 hover:text-purple-700 font-medium text-sm">
                                                        Continue Learning →
                                                    </a>
                                                @endif
                                            </div>
                                        @else
                                            <div class="bg-gray-100 rounded-lg p-4 text-center">
                                                <svg class="w-8 h-8 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                                </svg>
                                                <p class="text-sm text-gray-600">Complete previous levels to unlock</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>