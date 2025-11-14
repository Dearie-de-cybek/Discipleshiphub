<nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-600 to-purple-700 rounded-lg flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-bold text-gray-900 leading-tight">Kingdom</div>
                    <div class="text-sm font-bold text-gray-900 leading-tight">Heralds.</div>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">Home</a>
                <a href="{{ url('/about') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">About</a>
                <a href="{{ url('/curriculum') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">Curriculum</a>
                <a href="{{ url('/apply') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">Apply</a>
                
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105 shadow-sm">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">
                        Student Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-5 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105 shadow-sm">
                            Register
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-cloak 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             class="lg:hidden py-4 space-y-3 border-t border-gray-100">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">Home</a>
            <a href="{{ url('/about') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">About</a>
            <a href="{{ url('/curriculum') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">Curriculum</a>
            <a href="{{ url('/apply') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">Apply</a>
            
            @auth
                <a href="{{ url('/dashboard') }}" class="block px-3 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-sm font-medium transition-colors">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">Student Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block px-3 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg text-sm font-medium transition-colors">Register</a>
                @endif
            @endauth
        </div>
    </div>
</nav>

<!-- Add padding to body to account for fixed nav -->
<div class="h-20"></div>

@once
@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
@endonce