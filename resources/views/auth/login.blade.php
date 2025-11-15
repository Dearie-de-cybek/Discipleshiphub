@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<div class="min-h-[calc(100vh-200px)] flex items-center justify-center py-12 px-6 bg-gradient-to-br from-purple-50 to-white">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Welcome Back</h2>
                <p class="text-gray-600 mt-2">Sign in to your account</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        autocomplete="username"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all @error('email') border-red-500 @enderror"
                        placeholder="your@email.com"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all @error('password') border-red-500 @enderror"
                        placeholder="••••••••"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            name="remember" 
                            class="rounded border-gray-300 text-purple-600 shadow-sm focus:ring-purple-500"
                        >
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-purple-600 hover:text-purple-900 font-medium">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button 
                        type="submit" 
                        class="w-full px-4 py-3 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white font-semibold rounded-lg transition-all duration-200 transform hover:scale-[1.02] shadow-lg"
                    >
                        Log in
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <div class="mt-6 text-center border-t border-gray-100 pt-6">
                <p class="text-sm text-gray-600">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-700 font-semibold">
                        Register here
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection