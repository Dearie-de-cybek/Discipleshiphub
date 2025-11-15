<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Resources') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-2xl p-8 mb-8 shadow-xl">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
                            Learning Resources
                        </h1>
                        <p class="text-purple-100 text-lg">
                            Access all your course materials organized by week
                        </p>
                    </div>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-5 py-3 bg-white text-purple-700 rounded-xl font-semibold hover:bg-purple-50 transition-all shadow-lg whitespace-nowrap">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Dashboard
                    </a>
                </div>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white rounded-xl shadow-md p-6 text-center border-t-4 border-purple-600">
                    <div class="text-3xl font-bold text-gray-900 mb-1">{{ $totalWeeks }}</div>
                    <div class="text-sm text-gray-600">Program Weeks</div>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 text-center border-t-4 border-blue-600">
                    <div class="text-3xl font-bold text-gray-900 mb-1">{{ $totalResources }}</div>
                    <div class="text-sm text-gray-600">Total Resources</div>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 text-center border-t-4 border-red-600">
                    <div class="text-3xl font-bold text-gray-900 mb-1">{{ $videoCount }}</div>
                    <div class="text-sm text-gray-600">Videos</div>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 text-center border-t-4 border-green-600">
                    <div class="text-3xl font-bold text-gray-900 mb-1">{{ $audioCount + $documentCount }}</div>
                    <div class="text-sm text-gray-600">Audio & Docs</div>
                </div>
            </div>

            <!-- Resources by Week -->
            @if($resourcesByWeek->count() > 0)
                <div class="space-y-6">
                    @foreach($resourcesByWeek as $weekNumber => $weekResources)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <!-- Week Header -->
                            <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-5">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                            <span class="text-white font-bold text-2xl">{{ $weekNumber }}</span>
                                        </div>
                                        <div>
                                            <h2 class="text-2xl font-bold text-white">Week {{ $weekNumber }}</h2>
                                            <p class="text-purple-100 text-sm">{{ $weekResources->count() }} {{ Str::plural('resource', $weekResources->count()) }} available</p>
                                        </div>
                                    </div>
                                    <div class="hidden md:flex items-center space-x-2">
                                        @if($weekResources->where('type', 'video')->count() > 0)
                                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm">
                                                🎥 {{ $weekResources->where('type', 'video')->count() }}
                                            </span>
                                        @endif
                                        @if($weekResources->where('type', 'audio')->count() > 0)
                                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm">
                                                🎵 {{ $weekResources->where('type', 'audio')->count() }}
                                            </span>
                                        @endif
                                        @if($weekResources->where('type', 'document')->count() > 0)
                                            <span class="px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-white text-sm">
                                                📄 {{ $weekResources->where('type', 'document')->count() }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Resources List -->
                            <div class="p-6">
                                <div class="space-y-4">
                                    @foreach($weekResources as $resource)
                                        <div class="group border-2 border-gray-200 rounded-xl p-5 hover:border-purple-300 hover:shadow-md transition-all bg-gradient-to-br from-white to-gray-50">
                                            <div class="flex flex-col md:flex-row md:items-center gap-4">
                                                <!-- Icon -->
                                                <div class="flex-shrink-0">
                                                    <div class="w-16 h-16 rounded-xl flex items-center justify-center {{ 
                                                        $resource->type === 'video' ? 'bg-red-100' : 
                                                        ($resource->type === 'audio' ? 'bg-blue-100' : 
                                                        ($resource->type === 'document' ? 'bg-green-100' : 'bg-purple-100')) 
                                                    }}">
                                                        @if($resource->type === 'video')
                                                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                                            </svg>
                                                        @elseif($resource->type === 'audio')
                                                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                                                            </svg>
                                                        @elseif($resource->type === 'document')
                                                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                            </svg>
                                                        @else
                                                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                            </svg>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- Content -->
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-start justify-between gap-3 mb-2">
                                                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                                                            {{ $resource->title }}
                                                        </h3>
                                                        <span class="flex-shrink-0 px-3 py-1 text-xs font-semibold rounded-full {{ 
                                                            $resource->type === 'video' ? 'bg-red-100 text-red-700' : 
                                                            ($resource->type === 'audio' ? 'bg-blue-100 text-blue-700' : 
                                                            ($resource->type === 'document' ? 'bg-green-100 text-green-700' : 'bg-purple-100 text-purple-700')) 
                                                        }} uppercase">
                                                            {{ $resource->type }}
                                                        </span>
                                                    </div>
                                                    
                                                    @if($resource->description)
                                                        <p class="text-gray-600 text-sm mb-3">
                                                            {{ $resource->description }}
                                                        </p>
                                                    @endif

                                                    <div class="flex items-center text-xs text-gray-500">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                        Posted {{ $resource->created_at->format('M d, Y') }}
                                                    </div>
                                                </div>

                                                <!-- Action Button -->
                                                <div class="flex-shrink-0">
                                                    @if($resource->file_path)
                                                        <a href="{{ Storage::url($resource->file_path) }}" 
                                                           target="_blank"
                                                           download="{{ $resource->title }}"
                                                           class="inline-flex items-center px-5 py-3 {{ 
                                                               $resource->type === 'video' ? 'bg-red-600 hover:bg-red-700' : 
                                                               ($resource->type === 'audio' ? 'bg-blue-600 hover:bg-blue-700' : 
                                                               ($resource->type === 'document' ? 'bg-green-600 hover:bg-green-700' : 'bg-purple-600 hover:bg-purple-700')) 
                                                           }} text-white font-semibold rounded-xl transition-all shadow-md hover:shadow-lg whitespace-nowrap">
                                                            @if($resource->type === 'video')
                                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                                </svg>
                                                                Watch Now
                                                            @elseif($resource->type === 'audio')
                                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                                </svg>
                                                                Listen Now
                                                            @else
                                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                                </svg>
                                                                Download
                                                            @endif
                                                        </a>
                                                    @else
                                                        <span class="text-sm text-gray-400 italic">No file available</span>
                                                    @endif
                                                </div>
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
                    <h3 class="text-3xl font-bold text-gray-900 mb-3">No Resources Yet</h3>
                    <p class="text-gray-600 text-lg mb-8">
                        Resources will appear here once they are published by the admin.
                    </p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>