@extends('layouts.guest')

@section('title', 'Home')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-white">
    <!-- Purple Circle Decoration -->
    <div class="absolute right-0 top-0 w-[600px] h-[600px] translate-x-1/3 -translate-y-1/4">
        <div class="w-full h-full bg-gradient-to-br from-purple-600 to-purple-700 rounded-full opacity-90 relative">
            <!-- Concentric circles -->
            <div class="absolute inset-8 border-2 border-white/20 rounded-full"></div>
            <div class="absolute inset-16 border-2 border-white/20 rounded-full"></div>
            <div class="absolute inset-24 border-2 border-white/20 rounded-full"></div>
            <div class="absolute inset-32 border-2 border-white/20 rounded-full"></div>
        </div>
    </div>

    <div class="container mx-auto px-6 lg:px-20 relative z-10">
        <div class="max-w-2xl">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 bg-purple-100 rounded-full text-sm font-medium mb-8 border border-purple-200">
                <span class="w-2 h-2 bg-purple-600 rounded-full mr-2"></span>
                12-Week Intensive Program
            </div>
            
            <h1 class="text-5xl lg:text-7xl font-bold text-gray-900 mb-6 leading-tight">
                Kingdom Heralds
            </h1>
            
            <p class="text-xl md:text-2xl text-purple-700 mb-4 font-medium italic">
                Raising Voices for the King and His Kingdom
            </p>

            <div class="max-w-3xl mx-auto mb-12">
                <p class="text-lg text-gray-600 leading-relaxed">
                    "I am a voice ordained in eternity, awakened for such a time as this and generations to come. The Spirit of the Lord is upon me, for He has anointed me to herald the message of the King."
                </p>
            </div>

            <div class="flex flex-col sm:flex-row items-center gap-4 mb-12">
                <a href="{{ url('/apply') }}" class="px-8 py-4 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-semibold text-lg transition-all duration-200 transform hover:scale-105 shadow-lg">
                    Apply Now
                </a>
                <a href="#vision" class="px-8 py-4 bg-white hover:bg-gray-50 text-purple-600 border-2 border-purple-600 rounded-lg font-semibold text-lg transition-all duration-200">
                    Learn More
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-8 mt-20 max-w-2xl">
                <div class="text-center">
                    <div class="text-4xl font-bold text-purple-600 mb-2">12</div>
                    <div class="text-sm text-gray-600">Weeks</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-purple-600 mb-2">3</div>
                    <div class="text-sm text-gray-600">Months</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-purple-600 mb-2">∞</div>
                    <div class="text-sm text-gray-600">Impact</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Social Media Icons (Top Right) -->
    <div class="absolute top-8 right-8 flex gap-4 z-20">
        <a href="#" class="w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center hover:bg-purple-100 transition-colors">
            <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
        </a>
        <a href="#" class="w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center hover:bg-purple-100 transition-colors">
            <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
            </svg>
        </a>
        <a href="#" class="w-10 h-10 bg-white shadow-lg rounded-full flex items-center justify-center hover:bg-purple-100 transition-colors">
            <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
        </a>
    </div>
</section>

<!-- Vision Section -->
<section id="vision" class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Vision</h2>
            <div class="w-20 h-1 bg-yellow-400 mx-auto mb-6"></div>
        </div>

        <div class="bg-white border-2 border-purple-100 rounded-2xl p-8 md:p-12 max-w-4xl mx-auto mb-12">
            <p class="text-lg text-gray-700 leading-relaxed text-center">
                To raise heralds who <span class="text-purple-600 font-semibold">understand</span>, <span class="text-purple-600 font-semibold">embody</span>, and <span class="text-purple-600 font-semibold">proclaim</span> the message of God's Kingdom with boldness, purity, and authority in every sphere of engagement.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">Theoretical</h3>
                <p class="text-gray-600 text-sm">Deep biblical foundations and doctrinal clarity</p>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">Practical</h3>
                <p class="text-gray-600 text-sm">Hands-on ministry training and activation</p>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">Spiritual Formation</h3>
                <p class="text-gray-600 text-sm">Character development and intimacy with God</p>
            </div>
        </div>
    </div>
</section>

<!-- Curriculum Overview -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">12-Week Curriculum</h2>
            <div class="w-20 h-1 bg-yellow-400 mx-auto mb-6"></div>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                A comprehensive journey through Kingdom principles, prophetic ministry, and apostolic leadership
            </p>
        </div>

        <div class="space-y-8 max-w-6xl mx-auto">
            <!-- Month 1 -->
            <div class="bg-gradient-to-br from-purple-50 to-white border-2 border-purple-200 rounded-2xl p-8 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center mr-4">
                        <span class="text-2xl font-bold text-white">1</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Month 1</h3>
                        <p class="text-gray-600">Foundation & Identity</p>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 1: Kingdom Perspectives</h4>
                        <p class="text-sm text-gray-600">Overview of the Kingdom of God, The King, His Kingdom & Covenant</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 2: Spiritual Formation</h4>
                        <p class="text-sm text-gray-600">Identity in Christ, Intimacy with God, Spiritual Disciplines</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 3: Prayer & Intercession</h4>
                        <p class="text-sm text-gray-600">Effective Prayer, Intercession & Watchman Ministry, Fasting</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 4: Worship & Expression</h4>
                        <p class="text-sm text-gray-600">Prophetic Worship, Music, Drama & Arts in Heralding</p>
                    </div>
                </div>
            </div>

            <!-- Month 2 -->
            <div class="bg-gradient-to-br from-purple-50 to-white border-2 border-purple-200 rounded-2xl p-8 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center mr-4">
                        <span class="text-2xl font-bold text-white">2</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Month 2</h3>
                        <p class="text-gray-600">Equipping & Empowering</p>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 5: Prophetic Ministry</h4>
                        <p class="text-sm text-gray-600">The Prophetic Call, Hearing God's Voice, Gifts of the Spirit</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 6: Evangelism & Missions</h4>
                        <p class="text-sm text-gray-600">Kingdom Evangelism, Power Evangelism, Cross-cultural Witnessing</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 7: Apostolic Leadership</h4>
                        <p class="text-sm text-gray-600">Fivefold Ministry, Kingdom Authority, Building Teams</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 8: Culture & Reformation</h4>
                        <p class="text-sm text-gray-600">7 Mountains of Culture, Marketplace Ministry, Media</p>
                    </div>
                </div>
            </div>

            <!-- Month 3 -->
            <div class="bg-gradient-to-br from-purple-50 to-white border-2 border-purple-200 rounded-2xl p-8 hover:shadow-xl transition-all duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center mr-4">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900">Month 3</h3>
                        <p class="text-gray-600">Activation & Commissioning</p>
                    </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 9: Ministry Practicum</h4>
                        <p class="text-sm text-gray-600">Street Evangelism, Prophetic Sessions, Worship Nights</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 10: Mentoring</h4>
                        <p class="text-sm text-gray-600">Small Groups, Conflict Resolution, Healthy Relationships</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
                        <h4 class="font-semibold mb-2 text-gray-900">Week 11: Strategy & Vision</h4>
                        <p class="text-sm text-gray-600">Personal Mandate, Ministry Vision, Navigating Opposition</p>
                    </div>
                    <div class="bg-white rounded-lg p-4 border border-purple-100">
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
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Assessment Methods</h2>
            <div class="w-20 h-1 bg-yellow-400 mx-auto mb-6"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-2 text-gray-900">Weekly Reflection Journals</h3>
                        <p class="text-sm text-gray-600">Personal takeaways and spiritual insights</p>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-2 text-gray-900">Group Projects</h3>
                        <p class="text-sm text-gray-600">Evangelism, worship, and prophetic activation</p>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-2 text-gray-900">Ministry Simulations</h3>
                        <p class="text-sm text-gray-600">Role-playing and real-time ministry tasks</p>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center mr-4 mt-1 flex-shrink-0">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold mb-2 text-gray-900">Final Presentation</h3>
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
        <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-3xl p-12 md:p-16 text-center relative overflow-hidden max-w-4xl mx-auto">
            <div class="relative z-10">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white">Ready to Answer the Call?</h2>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    Join us in becoming a herald for the King. The sound of awakening is in your mouth.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ url('/apply') }}" class="px-8 py-4 bg-white text-purple-600 hover:bg-gray-100 rounded-lg font-semibold text-lg transition-all duration-200 transform hover:scale-105 shadow-xl">
                        Apply for Next Cohort
                    </a>
                    <a href="{{ url('/about') }}" class="px-8 py-4 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-lg font-semibold text-lg transition-all duration-200 border-2 border-white/30">
                        Contact Us
                    </a>
                </div>

                <p class="mt-8 text-sm text-white/80">
                    Next intake: <span class="font-semibold text-white">January 2026</span>
                </p>
            </div>
        </div>
    </div>
</section>

@endsection