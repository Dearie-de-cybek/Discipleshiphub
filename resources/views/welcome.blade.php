@extends('layouts.guest')

@section('title', 'Home')

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
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
    }
    
    @keyframes pulse-slow {
        0%, 100% {
            opacity: 0.6;
        }
        50% {
            opacity: 0.8;
        }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    .animate-fadeIn {
        animation: fadeIn 1s ease-out forwards;
    }
    
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }
    
    .animate-pulse-slow {
        animation: pulse-slow 3s ease-in-out infinite;
    }
    
    .delay-100 { animation-delay: 0.1s; opacity: 0; }
    .delay-200 { animation-delay: 0.2s; opacity: 0; }
    .delay-300 { animation-delay: 0.3s; opacity: 0; }
    .delay-400 { animation-delay: 0.4s; opacity: 0; }
    .delay-500 { animation-delay: 0.5s; opacity: 0; }
    .delay-600 { animation-delay: 0.6s; opacity: 0; }
    
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

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-white via-purple-50/30 to-white">
    <!-- Purple Circle Decoration - Hidden on mobile, visible on larger screens -->
    <div class="hidden lg:block absolute right-0 top-0 w-[600px] h-[600px] translate-x-1/3 -translate-y-1/4 animate-pulse-slow">
        <div class="w-full h-full bg-gradient-to-br from-purple-600 to-purple-700 rounded-full opacity-70 relative">
            <!-- Concentric circles -->
            <div class="absolute inset-8 border-2 border-white/30 rounded-full"></div>
            <div class="absolute inset-16 border-2 border-white/30 rounded-full"></div>
            <div class="absolute inset-24 border-2 border-white/30 rounded-full"></div>
            <div class="absolute inset-32 border-2 border-white/30 rounded-full"></div>
        </div>
    </div>

    <div class="container mx-auto px-6 lg:px-20 relative z-10 py-20">
        <div class="max-w-2xl">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 bg-purple-100 rounded-full text-sm font-medium mb-8 border border-purple-200 animate-fadeInUp">
                <span class="w-2 h-2 bg-purple-600 rounded-full mr-2 animate-pulse"></span>
                12-Week Intensive Program
            </div>
            
            <h1 class="text-5xl lg:text-7xl font-bold text-gray-900 mb-6 leading-tight animate-fadeInUp delay-100">
                Kingdom Heralds
            </h1>
            
            <p class="text-xl md:text-2xl text-purple-700 mb-4 font-semibold animate-fadeInUp delay-200">
                Raising Voices for the King and His Kingdom
            </p>

            <div class="max-w-3xl mx-auto mb-12 animate-fadeInUp delay-300">
                <p class="text-lg text-gray-600 leading-relaxed">
                    "I am a voice ordained in eternity, awakened for such a time as this and generations to come. The Spirit of the Lord is upon me, for He has anointed me to herald the message of the King."
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-12 animate-fadeInUp delay-400">
                <a href="{{ url('/apply') }}" class="px-8 py-4 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl hover:shadow-purple-500/50">
                    Apply Now
                </a>
                <a href="#vision" class="px-8 py-4 bg-white hover:bg-purple-50 text-purple-600 border-2 border-purple-600 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-sm">
                    Learn More
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-8 mt-20 max-w-2xl animate-fadeInUp delay-500">
                <div class="text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-purple-700 bg-clip-text text-transparent mb-2">12</div>
                    <div class="text-sm text-gray-600 font-medium">Weeks</div>
                </div>
                <div class="text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-purple-700 bg-clip-text text-transparent mb-2">3</div>
                    <div class="text-sm text-gray-600 font-medium">Months</div>
                </div>
                <div class="text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-purple-700 bg-clip-text text-transparent mb-2">∞</div>
                    <div class="text-sm text-gray-600 font-medium">Impact</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating decoration -->
    <div class="absolute bottom-10 left-10 w-20 h-20 bg-yellow-400/20 rounded-full blur-xl animate-float hidden lg:block"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-purple-400/20 rounded-full blur-xl animate-float hidden lg:block" style="animation-delay: 1s;"></div>
</section>

<!-- Vision Section -->
<section id="vision" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Our Vision</h2>
            <!-- Wavy Line SVG -->
            <div class="flex justify-center mb-6">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

        <div class="bg-gradient-to-br from-white to-purple-50 border-2 border-purple-200 rounded-2xl p-8 md:p-12 max-w-4xl mx-auto mb-12 shadow-lg hover:shadow-xl transition-shadow duration-300">
            <p class="text-lg text-gray-700 leading-relaxed text-center">
                To raise heralds who <span class="text-purple-600 font-semibold">understand</span>, <span class="text-purple-600 font-semibold">embody</span>, and <span class="text-purple-600 font-semibold">proclaim</span> the message of God's Kingdom with boldness, purity, and authority in every sphere of engagement.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Card 1 - Modern Interactive Design -->
            <div class="group relative bg-white rounded-2xl p-8 card-hover card-glow border border-gray-200 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-600/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl flex items-center justify-center mb-6 transform group-hover:rotate-12 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl mb-3 text-gray-900 group-hover:text-purple-600 transition-colors duration-300">Theoretical</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Deep biblical foundations and doctrinal clarity</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="group relative bg-white rounded-2xl p-8 card-hover card-glow border border-gray-200 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-yellow-400/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-2xl flex items-center justify-center mb-6 transform group-hover:rotate-12 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl mb-3 text-gray-900 group-hover:text-yellow-600 transition-colors duration-300">Practical</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Hands-on ministry training and activation</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="group relative bg-white rounded-2xl p-8 card-hover card-glow border border-gray-200 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-600/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mb-6 transform group-hover:rotate-12 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-xl mb-3 text-gray-900 group-hover:text-blue-600 transition-colors duration-300">Spiritual Formation</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Character development and intimacy with God</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum Overview -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">12-Week Curriculum</h2>
            <!-- Wavy Line -->
            <div class="flex justify-center mb-6">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                A comprehensive journey through Kingdom principles, prophetic ministry, and apostolic leadership
            </p>
        </div>

        <div class="space-y-8 max-w-6xl mx-auto">
            <!-- Month 1 - Modern Design -->
            <div class="group bg-gradient-to-br from-purple-50 to-white border-2 border-purple-200 rounded-3xl p-8 md:p-10 card-hover card-glow overflow-hidden relative">
                <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-purple-600/5 to-transparent rounded-full transform group-hover:scale-150 transition-transform duration-700"></div>
                <div class="flex items-center mb-8 relative z-10">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl flex items-center justify-center mr-6 shadow-xl transform group-hover:rotate-6 transition-transform duration-300">
                        <span class="text-3xl font-bold text-white">1</span>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-gray-900">Month 1</h3>
                        <p class="text-gray-600 text-lg">Foundation & Identity</p>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4 relative z-10">
                    <div class="bg-white rounded-xl p-5 border border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 1: Kingdom Perspectives</h4>
                        <p class="text-sm text-gray-600">Overview of the Kingdom of God, The King, His Kingdom & Covenant</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 2: Spiritual Formation</h4>
                        <p class="text-sm text-gray-600">Identity in Christ, Intimacy with God, Spiritual Disciplines</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 3: Prayer & Intercession</h4>
                        <p class="text-sm text-gray-600">Effective Prayer, Intercession & Watchman Ministry, Fasting</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 4: Worship & Expression</h4>
                        <p class="text-sm text-gray-600">Prophetic Worship, Music, Drama & Arts in Heralding</p>
                    </div>
                </div>
            </div>

            <!-- Month 2 -->
            <div class="group bg-gradient-to-br from-blue-50 to-white border-2 border-blue-200 rounded-3xl p-8 md:p-10 card-hover card-glow overflow-hidden relative">
                <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-blue-600/5 to-transparent rounded-full transform group-hover:scale-150 transition-transform duration-700"></div>
                <div class="flex items-center mb-8 relative z-10">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mr-6 shadow-xl transform group-hover:rotate-6 transition-transform duration-300">
                        <span class="text-3xl font-bold text-white">2</span>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-gray-900">Month 2</h3>
                        <p class="text-gray-600 text-lg">Equipping & Empowering</p>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4 relative z-10">
                    <div class="bg-white rounded-xl p-5 border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 5: Prophetic Ministry</h4>
                        <p class="text-sm text-gray-600">The Prophetic Call, Hearing God's Voice, Gifts of the Spirit</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 6: Evangelism & Missions</h4>
                        <p class="text-sm text-gray-600">Kingdom Evangelism, Power Evangelism, Cross-cultural Witnessing</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 7: Apostolic Leadership</h4>
                        <p class="text-sm text-gray-600">Fivefold Ministry, Kingdom Authority, Building Teams</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 8: Culture & Reformation</h4>
                        <p class="text-sm text-gray-600">7 Mountains of Culture, Marketplace Ministry, Media</p>
                    </div>
                </div>
            </div>

            <!-- Month 3 -->
            <div class="group bg-gradient-to-br from-yellow-50 to-white border-2 border-yellow-300 rounded-3xl p-8 md:p-10 card-hover card-glow overflow-hidden relative">
                <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-yellow-400/5 to-transparent rounded-full transform group-hover:scale-150 transition-transform duration-700"></div>
                <div class="flex items-center mb-8 relative z-10">
                    <div class="w-20 h-20 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-2xl flex items-center justify-center mr-6 shadow-xl transform group-hover:rotate-6 transition-transform duration-300">
                        <span class="text-3xl font-bold text-white">3</span>
                    </div>
                    <div>
                        <h3 class="text-3xl font-bold text-gray-900">Month 3</h3>
                        <p class="text-gray-600 text-lg">Activation & Commissioning</p>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4 relative z-10">
                    <div class="bg-white rounded-xl p-5 border border-yellow-200 hover:border-yellow-400 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 9: Ministry Practicum</h4>
                        <p class="text-sm text-gray-600">Street Evangelism, Prophetic Sessions, Worship Nights</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-yellow-200 hover:border-yellow-400 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 10: Mentoring</h4>
                        <p class="text-sm text-gray-600">Small Groups, Conflict Resolution, Healthy Relationships</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-yellow-200 hover:border-yellow-400 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 11: Strategy & Vision</h4>
                        <p class="text-sm text-gray-600">Personal Mandate, Ministry Vision, Navigating Opposition</p>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-yellow-200 hover:border-yellow-400 transition-all duration-300 hover:shadow-md">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 12: Commissioning</h4>
                        <p class="text-sm text-gray-600">Final Assessment, Prophetic Impartation, Commission as Heralds</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Assessment Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Assessment Methods</h2>
            <!-- Wavy Line -->
            <div class="flex justify-center mb-6">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6 max-w-5xl mx-auto">
            <div class="group bg-white rounded-2xl p-8 card-hover card-glow border border-gray-200 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-600/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-start relative z-10">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-600 to-purple-700 rounded-xl flex items-center justify-center mr-4 flex-shrink-0 shadow-lg transform group-hover:rotate-12 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-gray-900 group-hover:text-purple-600 transition-colors duration-300">Weekly Reflection Journals</h3>
                        <p class="text-sm text-gray-600">Personal takeaways and spiritual insights</p>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl p-8 card-hover card-glow border border-gray-200 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-yellow-400/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-start relative z-10">
                    <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center mr-4 flex-shrink-0 shadow-lg transform group-hover:rotate-12 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-gray-900 group-hover:text-yellow-600 transition-colors duration-300">Group Projects</h3>
                        <p class="text-sm text-gray-600">Evangelism, worship, and prophetic activation</p>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl p-8 card-hover card-glow border border-gray-200 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-600/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-start relative z-10">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center mr-4 flex-shrink-0 shadow-lg transform group-hover:rotate-12 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-gray-900 group-hover:text-blue-600 transition-colors duration-300">Ministry Simulations</h3>
                        <p class="text-sm text-gray-600">Role-playing and real-time ministry tasks</p>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl p-8 card-hover card-glow border border-gray-200 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-pink-600/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="flex items-start relative z-10">
                    <div class="w-14 h-14 bg-gradient-to-br from-pink-600 to-pink-700 rounded-xl flex items-center justify-center mr-4 flex-shrink-0 shadow-lg transform group-hover:rotate-12 transition-transform duration-300">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-gray-900 group-hover:text-pink-600 transition-colors duration-300">Final Presentation</h3>
                        <p class="text-sm text-gray-600">Articulation of personal mandate and vision</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="relative bg-gradient-to-br from-purple-600 via-purple-700 to-purple-800 rounded-3xl p-12 md:p-16 text-center overflow-hidden max-w-5xl mx-auto shadow-2xl">
            <!-- Animated background elements -->
            <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1.5s;"></div>
            
            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white">Ready to Answer the Call?</h2>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Join us in becoming a herald for the King. The sound of awakening is in your mouth.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ url('/apply') }}" class="px-8 py-4 bg-white text-purple-600 hover:bg-gray-100 rounded-xl font-semibold text-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                        Apply for Next Cohort
                    </a>
                    <a href="{{ url('/about') }}" class="px-8 py-4 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-xl font-semibold text-lg transition-all duration-300 border-2 border-white/30 hover:border-white/50">
                        Contact Us
                    </a>
                </div>

                <p class="mt-8 text-sm text-white/80">
                    Next intake: <span class="font-semibold text-white">2026</span>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection