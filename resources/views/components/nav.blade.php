<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md shadow-sm border-b border-white/20" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
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
                <a href="{{ route('home') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">Home</a>
                <a href="{{ route('about') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">About</a>
                <a href="{{ route('curriculum') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">Curriculum</a>
                <a href="{{ route('apply') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">Apply</a>
                
                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="px-5 py-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105 shadow-sm">
                            Admin Dashboard
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="px-5 py-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105 shadow-sm">
                            Dashboard
                        </a>
                    @endif
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm font-medium text-gray-900 hover:text-red-600 transition-colors duration-200">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-900 hover:text-purple-600 transition-colors duration-200">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="px-5 py-2 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-lg text-sm font-medium transition-all duration-200 transform hover:scale-105 shadow-sm">
                        Register
                    </a>
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
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">Home</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">About</a>
            <a href="{{ route('curriculum') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">Curriculum</a>
            <a href="{{ route('apply') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">Apply</a>
            
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg text-sm font-medium transition-colors">Admin Dashboard</a>
                @else
                    <a href="{{ route('dashboard') }}" class="block px-3 py-2 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg text-sm font-medium transition-colors">Dashboard</a>
                @endif
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-3 py-2 rounded-lg hover:bg-red-50 text-sm font-medium text-red-600 transition-colors">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-sm font-medium text-gray-900 transition-colors">Login</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 bg-gradient-to-r from-purple-600 to-purple-700 text-white rounded-lg text-sm font-medium transition-colors">Register</a>
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