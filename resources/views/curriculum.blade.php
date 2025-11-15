@extends('layouts.guest')

@section('title', 'Curriculum')

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
    
    .animate-pulse-slow {
        animation: pulse-slow 3s ease-in-out infinite;
    }
    
    .delay-100 { animation-delay: 0.1s; opacity: 0; }
    .delay-200 { animation-delay: 0.2s; opacity: 0; }
    .delay-300 { animation-delay: 0.3s; opacity: 0; }
    
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
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 animate-fadeInUp">12-Week Curriculum</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto animate-fadeInUp delay-100">
            A transformative journey through Kingdom principles, prophetic ministry, and apostolic leadership
        </p>
    </div>
</section>

<!-- Overview Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-20 max-w-5xl">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Three Pillars of Formation</h2>
            <div class="flex justify-center mb-6">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mb-16">
            <div class="group relative bg-white rounded-2xl p-8 card-hover card-glow border-2 border-purple-200 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-600/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl flex items-center justify-center mb-4 mx-auto transform group-hover:rotate-12 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-900 group-hover:text-purple-600 transition-colors duration-300">Theoretical</h3>
                    <p class="text-sm text-gray-600">Biblical foundations and doctrinal clarity</p>
                </div>
            </div>

            <div class="group relative bg-white rounded-2xl p-8 card-hover card-glow border-2 border-yellow-300 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-yellow-400/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-2xl flex items-center justify-center mb-4 mx-auto transform group-hover:rotate-12 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-900 group-hover:text-yellow-600 transition-colors duration-300">Practical</h3>
                    <p class="text-sm text-gray-600">Hands-on ministry training and activation</p>
                </div>
            </div>

            <div class="group relative bg-white rounded-2xl p-8 card-hover card-glow border-2 border-blue-200 overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-600/10 to-transparent rounded-bl-full transform group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10 text-center">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mb-4 mx-auto transform group-hover:rotate-12 transition-transform duration-300 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-900 group-hover:text-blue-600 transition-colors duration-300">Spiritual</h3>
                    <p class="text-sm text-gray-600">Character development and intimacy with God</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detailed Curriculum -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Week by Week Breakdown</h2>
            <div class="flex justify-center mb-6">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

        <div class="space-y-8 max-w-6xl mx-auto">
            <!-- Month 1 -->
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
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">1</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Kingdom Perspectives</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Overview of the Kingdom of God</li>
                            <li>• The King, His Kingdom & Covenant</li>
                            <li>• Biblical Authority and Sound Doctrine</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">2</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Spiritual Formation</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Identity in Christ & Sonship</li>
                            <li>• Intimacy with God</li>
                            <li>• Spiritual Disciplines & Devotion</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">3</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Prayer & Intercession</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Foundations of Effective Prayer</li>
                            <li>• Intercession & Watchman Ministry</li>
                            <li>• Fasting & Spiritual Sensitivity</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-purple-100 hover:border-purple-300 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">4</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Worship & Expression</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Redefining Worship</li>
                            <li>• Prophetic Worship & Atmosphere Shifting</li>
                            <li>• Music, Drama & Arts in Heralding</li>
                        </ul>
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
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">5</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Prophetic Ministry</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• The Prophetic Call of a Herald</li>
                            <li>• Hearing and Interpreting God's Voice</li>
                            <li>• Operating in the Gifts of the Spirit</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">6</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Evangelism & Missions</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Kingdom Evangelism Models</li>
                            <li>• Power Evangelism & Testimony</li>
                            <li>• Cross-cultural Witnessing</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">7</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Apostolic Leadership</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Fivefold Ministry and Heralds</li>
                            <li>• Leadership Ethics & Authority</li>
                            <li>• Building Apostolic Teams</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-blue-100 hover:border-blue-300 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">8</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Culture & Reformation</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• 7 Mountains of Culture</li>
                            <li>• Marketplace Ministry</li>
                            <li>• Media & Kingdom Messaging</li>
                        </ul>
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
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">9</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Ministry Practicum</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Street Evangelism</li>
                            <li>• Prophetic & Intercessory Sessions</li>
                            <li>• Worship Nights & Preaching Labs</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-yellow-200 hover:border-yellow-400 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">10</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Mentoring & Accountability</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Small Groups & Discipleship</li>
                            <li>• Conflict Resolution & Humility</li>
                            <li>• Healthy Ministry Relationships</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-yellow-200 hover:border-yellow-400 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">11</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Strategy & Vision Casting</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Crafting Personal Mandate</li>
                            <li>• Building Ministry Vision Boards</li>
                            <li>• Navigating Opposition</li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-xl p-5 border border-yellow-200 hover:border-yellow-400 transition-all duration-300 hover:shadow-md">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white font-bold text-sm">12</span>
                            </div>
                            <h4 class="font-semibold text-gray-900">Commissioning & Graduation</h4>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1 ml-11">
                            <li>• Final Assessment & Presentations</li>
                            <li>• Prophetic Impartation Service</li>
                            <li>• Commissioning as Kingdom Heralds</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="relative bg-gradient-to-br from-purple-600 via-purple-700 to-purple-800 rounded-3xl p-12 md:p-16 text-center overflow-hidden max-w-5xl mx-auto shadow-2xl">
            <div class="absolute top-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1.5s;"></div>
            
            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white">Ready to Begin?</h2>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    This comprehensive 12-week journey will transform you into a herald for the King. Start your application today.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ url('/apply') }}" class="px-10 py-5 bg-white text-purple-600 hover:bg-gray-100 rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-xl hover:shadow-2xl">
                        Apply Now
                    </a>
                    <a href="{{ url('/about') }}" class="px-10 py-5 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-xl font-bold text-lg transition-all duration-300 border-2 border-white/30 hover:border-white/50">
                        Learn More
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