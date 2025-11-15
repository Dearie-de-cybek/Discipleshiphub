<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Welcome Card with Waves -->
            <div class="relative bg-gradient-to-br from-purple-600 to-purple-800 rounded-2xl overflow-hidden shadow-xl">
                <!-- Wave SVG Background -->
                <div class="absolute inset-0 opacity-20">
                    <svg class="absolute bottom-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                        <path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,133.3C672,117,768,107,864,122.7C960,139,1056,181,1152,181.3C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        <path fill="rgba(255,255,255,0.05)" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,213.3C672,224,768,224,864,208C960,192,1056,160,1152,154.7C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                </div>

                <div class="relative px-6 py-8 md:px-10 md:py-12">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                        <div class="flex-1">
                            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">
                                Welcome back, {{ auth()->user()->name }}! 👋
                            </h1>
                            <p class="text-purple-100 text-lg">
                                Continue your journey with Kingdom Heralds
                            </p>
                        </div>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('resources.view') }}" class="inline-flex items-center px-5 py-3 bg-white text-purple-700 rounded-xl font-semibold hover:bg-purple-50 transition-all shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                View All Resources
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards with Waves -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                <!-- Total Resources Card -->
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <div class="absolute inset-0 opacity-10">
                        <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                            <path fill="#9333ea" d="M0,96L48,112C96,128,192,160,288,154.7C384,149,480,107,576,101.3C672,96,768,128,864,144C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-gray-600 text-sm font-medium mb-1">Total Resources</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ $resources->count() }}</p>
                        <p class="text-sm text-purple-600 mt-2">Available to learn</p>
                    </div>
                </div>

                <!-- Program Weeks Card -->
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <div class="absolute inset-0 opacity-10">
                        <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                            <path fill="#3b82f6" d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,144C672,139,768,181,864,197.3C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-gray-600 text-sm font-medium mb-1">Program Weeks</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ $resourcesByWeek->count() }}</p>
                        <p class="text-sm text-blue-600 mt-2">Curriculum sections</p>
                    </div>
                </div>

                <!-- Member Since Card -->
                <div class="relative bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow sm:col-span-2 lg:col-span-1">
                    <div class="absolute inset-0 opacity-10">
                        <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                            <path fill="#10b981" d="M0,224L48,208C96,192,192,160,288,160C384,160,480,192,576,197.3C672,203,768,181,864,154.7C960,128,1056,96,1152,90.7C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                        </svg>
                    </div>
                    <div class="relative p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-gray-600 text-sm font-medium mb-1">Member Since</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ auth()->user()->created_at->format('M Y') }}</p>
                        <p class="text-sm text-green-600 mt-2">{{ auth()->user()->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Access - Discipleship Features -->
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Discipleship Hub</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <!-- Journey Map -->
                    <a href="{{ route('discipleship.journey-map') }}" class="group relative bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl p-6 hover:shadow-lg transition-all border-2 border-purple-200 hover:border-purple-400">
                        <div class="absolute inset-0 opacity-10">
                            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                                <path fill="#9333ea" d="M0,96L48,112C96,128,192,160,288,154.7C384,149,480,107,576,101.3C672,96,768,128,864,144C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                            </svg>
                        </div>
                        <div class="relative">
                            <div class="w-14 h-14 bg-purple-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2 group-hover:text-purple-700 transition-colors">Journey Map</h3>
                            <p class="text-sm text-gray-600">Track your spiritual growth path</p>
                        </div>
                    </a>

                    <!-- Lessons -->
                    <a href="{{ route('discipleship.lessons.index') }}" class="group relative bg-gradient-to-br from-green-50 to-green-100 rounded-xl p-6 hover:shadow-lg transition-all border-2 border-green-200 hover:border-green-400">
                        <div class="absolute inset-0 opacity-10">
                            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                                <path fill="#10b981" d="M0,224L48,208C96,192,192,160,288,160C384,160,480,192,576,197.3C672,203,768,181,864,154.7C960,128,1056,96,1152,90.7C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                            </svg>
                        </div>
                        <div class="relative">
                            <div class="w-14 h-14 bg-green-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2 group-hover:text-green-700 transition-colors">Lessons</h3>
                            <p class="text-sm text-gray-600">Continue your learning path</p>
                        </div>
                    </a>

                    <!-- Daily Devotion -->
                    <a href="{{ route('discipleship.devotion') }}" class="group relative bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl p-6 hover:shadow-lg transition-all border-2 border-blue-200 hover:border-blue-400">
                        <div class="absolute inset-0 opacity-10">
                            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                                <path fill="#3b82f6" d="M0,160L48,176C96,192,192,224,288,213.3C384,203,480,149,576,144C672,139,768,181,864,197.3C960,213,1056,203,1152,186.7C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                            </svg>
                        </div>
                        <div class="relative">
                            <div class="w-14 h-14 bg-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2 group-hover:text-blue-700 transition-colors">Daily Devotion</h3>
                            <p class="text-sm text-gray-600">Today's spiritual reflection</p>
                        </div>
                    </a>

                    <!-- Profile -->
                    <a href="{{ route('profile.edit') }}" class="group relative bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl p-6 hover:shadow-lg transition-all border-2 border-orange-200 hover:border-orange-400">
                        <div class="absolute inset-0 opacity-10">
                            <svg class="absolute bottom-0 w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                                <path fill="#f97316" d="M0,96L48,112C96,128,192,160,288,154.7C384,149,480,107,576,101.3C672,96,768,128,864,144C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                            </svg>
                        </div>
                        <div class="relative">
                            <div class="w-14 h-14 bg-orange-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2 group-hover:text-orange-700 transition-colors">My Profile</h3>
                            <p class="text-sm text-gray-600">Manage your account</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Resources Section -->
            @if($resourcesByWeek->count() > 0)
                <div class="space-y-6">
                    @foreach($resourcesByWeek as $weekNumber => $weekResources)
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <!-- Week Header -->
                            <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center">
                                            <span class="text-white font-bold text-lg">{{ $weekNumber }}</span>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-bold text-white">Week {{ $weekNumber }}</h3>
                                            <p class="text-purple-100 text-sm">{{ $weekResources->count() }} {{ Str::plural('resource', $weekResources->count()) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Resources Grid -->
                            <div class="p-4 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach($weekResources as $resource)
                                        <div class="group border-2 border-gray-200 rounded-xl p-5 hover:border-purple-300 hover:shadow-lg transition-all bg-white">
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

                                            <!-- Title -->
                                            <h4 class="font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-600 transition-colors">
                                                {{ $resource->title }}
                                            </h4>
                                            
                                            <!-- Description -->
                                            @if($resource->description)
                                                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                                                    {{ $resource->description }}
                                                </p>
                                            @endif

                                            <!-- Footer -->
                                            <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                                <span class="text-xs text-gray-500">
                                                    {{ $resource->created_at->format('M d, Y') }}
                                                </span>
                                                
                                                @if($resource->file_path)
                                                    <a href="{{ Storage::url($resource->file_path) }}" 
                                                       target="_blank"
                                                       download="{{ $resource->title }}"
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
                                                @else
                                                    <span class="text-xs text-gray-400 italic">No file</span>
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
                <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                    <div class="w-20 h-20 bg-purple-100 rounded-2xl mx-auto mb-4 flex items-center justify-center">
                        <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No Resources Yet</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        Resources will appear here once they are published. Check back soon!
                    </p>
                    <a href="{{ route('resources.view') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-xl font-semibold transition-all shadow-lg">
                        View Curriculum
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>