<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Learning Resources') }}
            </h2>
            <a href="{{ route('dashboard') }}" class="text-purple-600 hover:text-purple-700 text-sm font-medium">
                ← Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Success/Info Messages -->
            @if(session('success'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('info'))
                <div class="mb-6 bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        {{ session('info') }}
                    </div>
                </div>
            @endif

            <!-- Header -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl p-8 mb-8 shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-4xl">{{ $currentLevel->icon }}</span>
                            <div>
                                <h1 class="text-3xl font-bold text-white mb-1">Kingdom Heralds Curriculum</h1>
                                <p class="text-purple-100">{{ $currentLevel->name }} • Level {{ $currentLevel->order }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-lg rounded-xl p-4 border border-white/20 text-center min-w-[150px]">
                        <div class="text-3xl font-bold text-white">{{ $resources->count() }}</div>
                        <div class="text-purple-200 text-sm">Total Resources</div>
                    </div>
                </div>
            </div>

            <!-- Resources by Week -->
            @if($resourcesByWeek->count() > 0)
                <div class="space-y-6">
                    @foreach($resourcesByWeek as $weekNumber => $weekResources)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <!-- Week Header -->
                            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h2 class="text-2xl font-bold text-white">Week {{ $weekNumber }}</h2>
                                        <p class="text-green-100 text-sm">{{ $weekResources->count() }} {{ Str::plural('resource', $weekResources->count()) }}</p>
                                    </div>
                                    <div class="bg-white/20 backdrop-blur-sm px-4 py-2 rounded-lg">
                                        <span class="text-white font-semibold">
                                            {{ $weekResources->count() }} Materials
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Resources Grid -->
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($weekResources as $resource)
                                        <div class="group border-2 border-gray-200 hover:border-purple-300 rounded-xl p-5 transition-all hover:shadow-md bg-white">
                                            <!-- Resource Type Icon -->
                                            <div class="flex items-start justify-between mb-3">
                                                <div class="w-12 h-12 rounded-lg flex items-center justify-center {{ 
                                                    $resource->type === 'video' ? 'bg-red-100' : 
                                                    ($resource->type === 'audio' ? 'bg-blue-100' : 
                                                    ($resource->type === 'document' ? 'bg-green-100' : 'bg-purple-100')) 
                                                }}">
                                                    @if($resource->type === 'video')
                                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                        </svg>
                                                    @elseif($resource->type === 'audio')
                                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                                        </svg>
                                                    @elseif($resource->type === 'document')
                                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                        </svg>
                                                    @else
                                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                        </svg>
                                                    @endif
                                                </div>
                                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ 
                                                    $resource->type === 'video' ? 'bg-red-100 text-red-700' : 
                                                    ($resource->type === 'audio' ? 'bg-blue-100 text-blue-700' : 
                                                    ($resource->type === 'document' ? 'bg-green-100 text-green-700' : 'bg-purple-100 text-purple-700')) 
                                                }} uppercase">
                                                    {{ $resource->type }}
                                                </span>
                                            </div>

                                            <!-- Title & Description -->
                                            <h3 class="font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-600 transition-colors">
                                                {{ $resource->title }}
                                            </h3>
                                            
                                            @if($resource->description)
                                                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                                    {{ $resource->description }}
                                                </p>
                                            @endif

                                            <!-- Footer with Action Button -->
                                            <div class="pt-3 border-t border-gray-100">
                                                <div class="flex items-center justify-between mb-3">
                                                    <span class="text-xs text-gray-500">
                                                        {{ $resource->created_at->format('M d, Y') }}
                                                    </span>
                                                    
                                                    @if($resource->file_path)
                                                        <a href="{{ Storage::url($resource->file_path) }}" 
                                                           target="_blank"
                                                           class="inline-flex items-center px-3 py-1.5 {{ 
                                                               $resource->type === 'video' ? 'bg-red-600 hover:bg-red-700' : 
                                                               ($resource->type === 'audio' ? 'bg-blue-600 hover:bg-blue-700' : 
                                                               ($resource->type === 'document' ? 'bg-green-600 hover:bg-green-700' : 'bg-purple-600 hover:bg-purple-700')) 
                                                           }} text-white text-sm font-medium rounded-lg transition-all">
                                                            @if($resource->type === 'video')
                                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                                </svg>
                                                                Watch
                                                            @elseif($resource->type === 'audio')
                                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                                </svg>
                                                                Listen
                                                            @else
                                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                                </svg>
                                                                View
                                                            @endif
                                                        </a>
                                                    @elseif($resource->external_link)
                                                        <a href="{{ $resource->external_link }}" 
                                                           target="_blank"
                                                           class="inline-flex items-center px-3 py-1.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-all">
                                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                            </svg>
                                                            Open
                                                        </a>
                                                    @else
                                                        <span class="text-xs text-gray-400 italic">No file</span>
                                                    @endif
                                                </div>

                                                <!-- Mark Complete Button -->
                                                @php
                                                    $isViewed = DB::table('resource_views')
                                                        ->where('user_id', $user->id)
                                                        ->where('resource_id', $resource->id)
                                                        ->exists();
                                                @endphp

                                                @if($isViewed)
    <div class="flex items-center justify-center px-4 py-2 bg-green-100 text-green-700 rounded-lg text-sm font-medium">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Completed +20 XP
    </div>
@else
    <form method="POST" action="{{ route('discipleship.resources.complete', $resource->id) }}" class="w-full">
        @csrf
        <button type="submit" class="w-full px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium text-sm transition-all">
            ✓ Mark as Complete (Earn 20 XP)
        </button>
    </form>
@endif
                                            </div>
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
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">No Resources Available Yet</h3>
                    <p class="text-gray-600 text-lg mb-8">
                        Learning resources will be published here soon. Check back later!
                    </p>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold transition-all">
                        Back to Dashboard
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>