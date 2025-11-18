<!-- Discipleship Progress Card -->
<section class="mb-6">
    @php
        $user->initializeProgress();
        $progress = $user->progress;
        $currentLevel = $user->currentLevel;
        $nextLevel = $currentLevel->getNextLevel();
        $progressPercentage = $progress->getProgressPercentage();
        $xpNeeded = $nextLevel ? ($nextLevel->xp_required - $user->xp_points) : 0;
    @endphp

    <div class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-2xl overflow-hidden shadow-xl">
        <!-- Wave Background -->
        <div class="absolute inset-0 opacity-20">
            <svg class="absolute bottom-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,133.3C672,117,768,107,864,122.7C960,139,1056,181,1152,181.3C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>

        <div class="relative p-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-white text-lg font-semibold mb-1">Your Spiritual Journey</h3>
                    <div class="flex items-center gap-2">
                        <span class="text-3xl">{{ $currentLevel->icon }}</span>
                        <div>
                            <p class="text-white font-bold text-xl">{{ $currentLevel->name }}</p>
                            <p class="text-purple-200 text-sm">Level {{ $currentLevel->order }}</p>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <div class="text-3xl font-bold text-white">{{ $user->xp_points }}</div>
                    <div class="text-purple-200 text-sm">Total XP</div>
                </div>
            </div>

            <!-- Progress Bar -->
            @if($nextLevel)
                <div class="mb-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-purple-100 text-sm">Progress to {{ $nextLevel->name }}</span>
                        <span class="text-purple-100 text-sm font-semibold">{{ number_format($progressPercentage, 1) }}%</span>
                    </div>
                    <div class="bg-white/20 backdrop-blur-sm rounded-full h-3 overflow-hidden">
                        <div class="bg-gradient-to-r from-yellow-400 to-yellow-200 h-full transition-all duration-500" 
                             style="width: {{ $progressPercentage }}%">
                        </div>
                    </div>
                    <p class="text-purple-100 text-xs mt-1">{{ $xpNeeded }} XP needed</p>
                </div>
            @else
                <div class="bg-yellow-500/20 backdrop-blur-sm rounded-lg p-3 mb-4">
                    <p class="text-white font-semibold text-center">🏆 Maximum Level Achieved!</p>
                </div>
            @endif

            <!-- Stats Grid -->
            <div class="grid grid-cols-3 gap-3">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 text-center">
                    <div class="text-2xl font-bold text-white">{{ $progress->devotion_streak }}</div>
                    <div class="text-purple-200 text-xs">Day Streak</div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 text-center">
                    <div class="text-2xl font-bold text-white">{{ $progress->lessons_completed }}</div>
                    <div class="text-purple-200 text-xs">Lessons Done</div>
                </div>
              
            </div>

            <!-- Quick Links -->
            <div class="mt-4 flex gap-2">
                <a href="{{ route('discipleship.journey-map') }}" class="flex-1 px-4 py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg text-sm font-medium transition-all text-center">
                    View Journey Map
                </a>
                <a href="{{ route('discipleship.lessons.index') }}" class="flex-1 px-4 py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg text-sm font-medium transition-all text-center">
                    Continue Learning
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Profile Information Section -->
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>