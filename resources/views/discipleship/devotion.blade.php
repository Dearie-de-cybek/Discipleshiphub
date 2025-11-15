<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daily Devotion') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-purple-600 hover:text-purple-700 text-sm font-medium">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if($todaysDevotion)
                <!-- Devotion Header -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 mb-8 shadow-xl text-white">
                    <div class="text-center">
                        <div class="text-blue-100 mb-2">{{ now()->format('l, F j, Y') }}</div>
                        <h1 class="text-3xl md:text-4xl font-bold mb-3">{{ $todaysDevotion->title }}</h1>
                        <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            <span class="font-semibold">{{ $todaysDevotion->scripture_reference }}</span>
                        </div>
                    </div>
                </div>

                <!-- Devotion Content -->
                <div class="bg-white rounded-2xl shadow-lg p-8 mb-6">
                    <!-- Scripture Section -->
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-6 mb-8 border-l-4 border-blue-600">
                        <h2 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            Scripture Reading
                        </h2>
                        <p class="text-gray-700 font-medium">{{ $todaysDevotion->scripture_reference }}</p>
                    </div>

                    <!-- Main Content -->
                    <div class="prose prose-lg max-w-none mb-8">
                        {!! nl2br(e($todaysDevotion->content)) !!}
                    </div>

                    <!-- Reflection Question -->
                    @if($todaysDevotion->reflection_question)
                        <div class="bg-yellow-50 rounded-xl p-6 mb-6 border-l-4 border-yellow-500">
                            <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                                Reflection Question
                            </h3>
                            <p class="text-gray-700 font-medium italic">{{ $todaysDevotion->reflection_question }}</p>
                        </div>
                    @endif

                    <!-- Prayer Point -->
                    @if($todaysDevotion->prayer_point)
                        <div class="bg-purple-50 rounded-xl p-6 border-l-4 border-purple-600">
                            <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                Prayer Point
                            </h3>
                            <p class="text-gray-700 font-medium">{{ $todaysDevotion->prayer_point }}</p>
                        </div>
                    @endif
                </div>

                <!-- Complete Devotion Button -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="text-center">
                        <form method="POST" action="{{ route('discipleship.devotion.complete') }}">
                            @csrf
                            <button 
                                type="submit" 
                                class="px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl font-bold text-lg transition-all shadow-lg hover:shadow-xl">
                                ✓ Complete Today's Devotion (+5 XP)
                            </button>
                        </form>
                        
                        @if($user->progress->devotion_streak > 0)
                            <p class="mt-4 text-gray-600">
                                🔥 Current Streak: <span class="font-bold text-orange-600">{{ $user->progress->devotion_streak }} {{ Str::plural('day', $user->progress->devotion_streak) }}</span>
                            </p>
                        @endif
                    </div>
                </div>

            @else
                <!-- No Devotion Available -->
                <div class="bg-white rounded-2xl shadow-lg p-16 text-center">
                    <div class="w-24 h-24 bg-blue-100 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">No Devotion Today</h3>
                    <p class="text-gray-600 text-lg mb-8">
                        Check back tomorrow for your daily devotion!
                    </p>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold transition-all">
                        Back to Dashboard
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>