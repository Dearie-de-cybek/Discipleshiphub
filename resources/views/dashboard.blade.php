<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 rounded-xl shadow-lg p-8 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-3xl font-bold mb-2">Welcome back, {{ auth()->user()->name }}! 👋</h3>
                        <p class="text-purple-100 text-lg">Continue your journey with Kingdom Heralds</p>
                    </div>
                    <div class="hidden md:block">
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                            <p class="text-purple-100 text-sm mb-1">Available Resources</p>
                            <p class="text-4xl font-bold">{{ $resources->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-600">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-purple-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 font-medium">Total Resources</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $resources->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-600">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 font-medium">Program Weeks</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $resourcesByWeek->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-600">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-100 rounded-lg p-3">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm text-gray-600 font-medium">Member Since</p>
                            <p class="text-2xl font-bold text-gray-900">{{ auth()->user()->created_at->format('M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resources by Week -->
            @if($resourcesByWeek->count() > 0)
                @foreach($resourcesByWeek as $weekNumber => $weekResources)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <!-- Week Header -->
                        <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-xl font-bold text-white">Week {{ $weekNumber }}</h3>
                                <span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-white text-sm font-medium">
                                    {{ $weekResources->count() }} {{ Str::plural('Resource', $weekResources->count()) }}
                                </span>
                            </div>
                        </div>

                        <!-- Resources Grid -->
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach($weekResources as $resource)
                                    <div class="border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-all bg-gradient-to-br from-white to-gray-50 group">
                                        <!-- Resource Type Badge -->
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full {{ 
                                                $resource->type === 'video' ? 'bg-red-100 text-red-700' : 
                                                ($resource->type === 'audio' ? 'bg-blue-100 text-blue-700' : 
                                                ($resource->type === 'document' ? 'bg-green-100 text-green-700' : 
                                                'bg-purple-100 text-purple-700')) 
                                            }}">
                                                @if($resource->type === 'video')
                                                    🎥 Video
                                                @elseif($resource->type === 'audio')
                                                    🎵 Audio
                                                @elseif($resource->type === 'document')
                                                    📄 Document
                                                @else
                                                    📚 {{ ucfirst($resource->type) }}
                                                @endif
                                            </span>
                                        </div>

                                        <!-- Resource Info -->
                                        <h4 class="font-bold text-gray-900 mb-2 text-lg group-hover:text-purple-600 transition-colors">
                                            {{ $resource->title }}
                                        </h4>
                                        
                                        @if($resource->description)
                                            <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $resource->description }}</p>
                                        @endif

                                        <!-- Action Button -->
                                        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
                                            <span class="text-xs text-gray-500">
                                                {{ $resource->created_at->format('M d, Y') }}
                                            </span>
                                            
                                            @if($resource->file_path)
                                                <a href="{{ Storage::url($resource->file_path) }}" 
                                                   target="_blank"
                                                   download="{{ $resource->title }}"
                                                   class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-all transform hover:scale-105">
                                                    @if($resource->type === 'video')
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                        </svg>
                                                        Watch
                                                    @elseif($resource->type === 'audio')
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"/>
                                                        </svg>
                                                        Listen
                                                    @else
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                        </svg>
                                                        Download
                                                    @endif
                                                </a>
                                            @else
                                                <span class="text-sm text-gray-500 italic">No file available</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-xl shadow-sm p-12">
                    <div class="text-center">
                        <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">No Resources Available Yet</h3>
                        <p class="text-gray-600 mb-6">Resources will appear here once they are published by the admin.</p>
                        <a href="{{ route('curriculum') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-medium transition-all">
                            View Curriculum Overview
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>