@extends('layouts.guest')

@section('title', 'About Us')

@push('styles')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
    @keyframes pulse-slow {
        0%, 100% {
            opacity: 0.3;
        }
        50% {
            opacity: 0.5;
        }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    .animate-fadeIn {
        animation: fadeIn 1s ease-out forwards;
    }
    
    .animate-pulse-slow {
        animation: pulse-slow 3s ease-in-out infinite;
    }
    
    .delay-100 { animation-delay: 0.1s; opacity: 0; }
    .delay-200 { animation-delay: 0.2s; opacity: 0; }
    .delay-300 { animation-delay: 0.3s; opacity: 0; }
    .delay-400 { animation-delay: 0.4s; opacity: 0; }
    
    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
        transform: translateY(-8px) scale(1.02);
    }
    
    .card-glow:hover {
        box-shadow: 0 20px 60px -15px rgba(147, 51, 234, 0.4);
    }
</style>
@endpush

@section('content')

<!-- Page Header -->
<section class="relative pt-32 pb-20 px-6 overflow-hidden bg-gradient-to-br from-white via-purple-50/30 to-white">
    <div class="absolute top-0 right-0 w-64 h-64 bg-purple-200 rounded-full blur-3xl opacity-40 animate-pulse-slow"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-yellow-200 rounded-full blur-3xl opacity-30 animate-pulse-slow" style="animation-delay: 1.5s;"></div>

    <div class="relative max-w-4xl mx-auto text-center z-10">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 animate-fadeInUp">About Kingdom Heralds</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto animate-fadeInUp delay-100">
            A discipleship school committed to raising voices that will proclaim the message of the King with authority and power
        </p>
    </div>
</section>

<!-- Affirmation Section -->
<section class="py-20 px-6 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Prophetic Affirmation</h2>
            <!-- Wavy Line -->
            <div class="flex justify-center mb-8">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        
        <div class="group relative bg-gradient-to-br from-white to-purple-50 border-2 border-purple-200 rounded-3xl p-8 md:p-12 card-hover card-glow overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-gradient-to-br from-purple-600/10 to-transparent rounded-full transform group-hover:scale-150 transition-transform duration-700"></div>
            
            <div class="relative z-10 space-y-6 text-gray-700 leading-relaxed">
                <p class="text-lg italic">
                    "I am a voice ordained in eternity, awakened for such a time as this and generations to come. The Spirit of the Lord is upon me, for He has anointed me to herald the message of the King. I do not go in my own strength, but in the fire of His presence."
                </p>
                <p class="text-lg italic">
                    "My tongue is like a ready pen, inscribing truth upon hearts. I decree what heaven declares. I proclaim liberty to captives, light to those in darkness, and the nearness of the Kingdom. I am sent—not by man, but by the Lord of Hosts. I walk in divine alignment, clothed in righteousness, armed with truth, and crowned with purpose."
                </p>
                <p class="text-lg italic font-semibold text-purple-700">
                    "The sound of awakening is in my mouth. I will not be silent. I am a herald of the King."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Fellowship Statement -->
<section class="py-20 px-6 bg-white">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">I AM A DISCIPLE OF CHRIST</h2>
            <!-- Wavy Line -->
            <div class="flex justify-center mt-4 mb-8">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>
        
        <div class="group relative bg-gradient-to-br from-gray-50 to-white border-2 border-gray-200 rounded-3xl p-8 md:p-12 card-hover shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 left-0 w-48 h-48 bg-gradient-to-br from-yellow-400/10 to-transparent rounded-full transform group-hover:scale-150 transition-transform duration-700"></div>
            
            <div class="relative z-10 space-y-4 text-gray-700 leading-relaxed">
                <p>I am part of the fellowship of the unashamed. I have Holy Spirit power. The die has been cast. I have stepped over the line. The decision has been made—I'm a disciple of His.</p>
                
                <p>I won't look back, let up, slow down, back away, or be still. My past is redeemed, my present makes sense, my future is secure. I'm finished and done with low living, sight walking, small planning, smooth knees, colorless dreams, tamed visions, worldly talking, cheap giving, and dwarfed goals.</p>
                
                <p>I no longer need preeminence, prosperity, position, promotions, plaudits, or popularity. I don't have to be right, first, tops, recognized, praised, regarded, or rewarded. I now live by faith, lean on His presence, walk by patience, am uplifted by prayer, and labor with power.</p>
                
                <p>My face is set, my gait is fast, my goal is heaven, my road is narrow, my way rough, my companions few, my Guide reliable, my mission clear.</p>
                
                <p>I cannot be bought, compromised, detoured, lured away, turned back, deluded, or delayed. I will not flinch in the face of sacrifice, hesitate in the presence of adversity, negotiate at the table of the enemy, ponder at the pool of popularity, or meander in the maze of mediocrity.</p>
                
                <p>I won't give up, shut up, let up, until I've stayed up, stored up, prayed up, paid up, preached up for the cause of Christ.</p>
                
                <p class="font-bold text-lg bg-gradient-to-r from-purple-600 to-purple-700 bg-clip-text text-transparent">I am a disciple of Jesus. I must go until He comes, give until I drop, preach until all know, and work until He stops me.</p>
                
                <p class="italic text-gray-600">And when He comes for His own, He'll have no problem recognizing me—My banner will be clear!</p>
            </div>
            <div class="relative z-10 mt-6 text-right text-sm text-gray-500 italic">
                — Unknown Missionary (The Fellowship of the Unashamed)
            </div>
        </div>
    </div>
</section>

<!-- Program Details -->
<section class="py-20 px-6 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">Program Overview</h2>
            <!-- Wavy Line -->
            <div class="flex justify-center mb-6">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
            <p class="text-xl text-gray-600">Comprehensive training in theoretical knowledge, practical skills, and spiritual formation</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Duration & Format Card -->
            <div class="group relative bg-white rounded-3xl p-8 md:p-10 card-hover card-glow border-2 border-purple-200 overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-purple-600/10 to-transparent rounded-full transform group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl flex items-center justify-center mr-4 shadow-lg transform group-hover:rotate-12 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 group-hover:text-purple-600 transition-colors duration-300">Duration & Format</h3>
                    </div>
                    
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-start group/item">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 mt-0.5 group-hover/item:bg-purple-600 transition-colors duration-300">
                                <svg class="w-5 h-5 text-purple-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span><strong>12 Weeks</strong> of intensive training (3 Months)</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 mt-0.5 group-hover/item:bg-purple-600 transition-colors duration-300">
                                <svg class="w-5 h-5 text-purple-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span>Theoretical, Practical, and Spiritual Formation</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 mt-0.5 group-hover/item:bg-purple-600 transition-colors duration-300">
                                <svg class="w-5 h-5 text-purple-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span>Hands-on ministry experience and activation</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 mt-0.5 group-hover/item:bg-purple-600 transition-colors duration-300">
                                <svg class="w-5 h-5 text-purple-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span>Small group accountability and mentoring</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Session Objectives Card -->
            <div class="group relative bg-white rounded-3xl p-8 md:p-10 card-hover card-glow border-2 border-blue-200 overflow-hidden">
                <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-blue-600/10 to-transparent rounded-full transform group-hover:scale-150 transition-transform duration-700"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mr-4 shadow-lg transform group-hover:rotate-12 transition-transform duration-300">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">Session Objectives</h3>
                    </div>
                    
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-start group/item">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 mt-0.5 group-hover/item:bg-blue-600 transition-colors duration-300">
                                <svg class="w-5 h-5 text-blue-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span>Gain foundational understanding of the Kingdom of God</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 mt-0.5 group-hover/item:bg-blue-600 transition-colors duration-300">
                                <svg class="w-5 h-5 text-blue-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span>Develop strong spiritual disciplines and Christ-like character</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 mt-0.5 group-hover/item:bg-blue-600 transition-colors duration-300">
                                <svg class="w-5 h-5 text-blue-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span>Cultivate sensitivity to the Holy Spirit and prophetic insight</span>
                        </li>
                        <li class="flex items-start group/item">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0 mt-0.5 group-hover/item:bg-blue-600 transition-colors duration-300">
                                <svg class="w-5 h-5 text-blue-600 group-hover/item:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span>Discover and articulate your personal Kingdom mandate</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 px-6 bg-white">
    <div class="max-w-4xl mx-auto">
        <div class="relative bg-gradient-to-br from-purple-600 via-purple-700 to-purple-800 rounded-3xl p-12 md:p-16 text-center overflow-hidden shadow-2xl">
            <!-- Animated background elements -->
            <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1.5s;"></div>
            
            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white">Join the Next Cohort</h2>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Applications are now open for our next intake. Begin your journey as a Kingdom Herald.
                </p>
                <a href="{{ url('/apply') }}" class="inline-block px-10 py-5 bg-white text-purple-600 hover:bg-gray-100 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                    Apply Now
                </a>
                <p class="mt-8 text-sm text-white/80">
                    Next intake: <span class="font-semibold text-white">January 2026</span>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection