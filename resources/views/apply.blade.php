@extends('layouts.guest')

@section('title', 'Apply')

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
    
    .input-focus {
        transition: all 0.3s ease;
    }
    
    .input-focus:focus {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px -8px rgba(147, 51, 234, 0.3);
    }
</style>
@endpush

@section('content')

<!-- Page Header -->
<section class="relative pt-32 pb-20 px-6 overflow-hidden bg-gradient-to-br from-white via-purple-50/30 to-white">
    <div class="absolute top-0 right-0 w-64 h-64 bg-purple-200 rounded-full blur-3xl opacity-40 animate-pulse-slow"></div>
    <div class="absolute bottom-0 left-0 w-48 h-48 bg-yellow-200 rounded-full blur-3xl opacity-30 animate-pulse-slow" style="animation-delay: 1.5s;"></div>

    <div class="relative max-w-4xl mx-auto text-center z-10">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 animate-fadeInUp">Apply to Kingdom Heralds</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto animate-fadeInUp delay-100">
            Take the first step in your journey as a herald for the King. Applications for 2026 intake are now open.
        </p>
    </div>
</section>

<!-- Application Info -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-6 lg:px-20 max-w-5xl">
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="text-center p-6 bg-purple-50 rounded-2xl border border-purple-200">
                <div class="w-14 h-14 bg-gradient-to-br from-purple-600 to-purple-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Next Intake</h3>
                <p class="text-sm text-gray-600"> 2026</p>
            </div>
            
            <div class="text-center p-6 bg-blue-50 rounded-2xl border border-blue-200">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Duration</h3>
                <p class="text-sm text-gray-600">12 Weeks Intensive</p>
            </div>
            
            <div class="text-center p-6 bg-yellow-50 rounded-2xl border border-yellow-300">
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Application</h3>
                <p class="text-sm text-gray-600">Rolling Admission</p>
            </div>
        </div>
    </div>
</section>

<!-- Application Form -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-20 max-w-4xl">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Application Form</h2>
            <div class="flex justify-center mb-6">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
            <p class="text-gray-600">Please fill out all required fields to submit your application</p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-200">
            <form method="POST" action="{{ url('/apply/submit') }}" class="space-y-6">
                @csrf
                
                <!-- Personal Information -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div class="w-10 h-10 bg-purple-600 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        Personal Information
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">First Name *</label>
                            <input type="text" name="first_name" required 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300"
                                placeholder="Enter your first name">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name *</label>
                            <input type="text" name="last_name" required 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300"
                                placeholder="Enter your last name">
                        </div>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                            <input type="email" name="email" required 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300"
                                placeholder="your.email@example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                            <input type="tel" name="phone" required 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300"
                                placeholder="+234 xxx xxx xxxx">
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth *</label>
                        <input type="date" name="dob" required 
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300">
                    </div>
                    
                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Address *</label>
                        <textarea name="address" rows="3" required 
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300 resize-none"
                            placeholder="Enter your full address"></textarea>
                    </div>
                </div>

                <hr class="my-8 border-gray-200">

                <!-- Spiritual Background -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        Spiritual Background
                    </h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Church/Ministry Affiliation *</label>
                            <input type="text" name="church" required 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300"
                                placeholder="Your home church or ministry">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Years as a Believer *</label>
                            <select name="years_believer" required 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300">
                                <option value="">Select...</option>
                                <option value="0-1">Less than 1 year</option>
                                <option value="1-3">1-3 years</option>
                                <option value="3-5">3-5 years</option>
                                <option value="5-10">5-10 years</option>
                                <option value="10+">10+ years</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Why do you want to join Kingdom Heralds? *</label>
                            <textarea name="motivation" rows="5" required 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300 resize-none"
                                placeholder="Share your heart and vision..."></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Describe your current ministry involvement (if any)</label>
                            <textarea name="ministry_involvement" rows="4" 
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-purple-600 focus:outline-none input-focus transition-all duration-300 resize-none"
                                placeholder="Youth ministry, worship team, outreach, etc."></textarea>
                        </div>
                    </div>
                </div>

                <hr class="my-8 border-gray-200">

                <!-- Commitment & Agreement -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        Commitment
                    </h3>
                    
                    <div class="space-y-4">
                        <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-purple-300 transition-all duration-300 cursor-pointer group">
                            <input type="checkbox" name="commitment_12weeks" required class="mt-1 mr-3 w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                            <span class="text-sm text-gray-700 group-hover:text-gray-900">
                                I commit to attending the full 12-week program and understand that regular attendance is required.
                            </span>
                        </label>
                        
                        <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-purple-300 transition-all duration-300 cursor-pointer group">
                            <input type="checkbox" name="commitment_assignments" required class="mt-1 mr-3 w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                            <span class="text-sm text-gray-700 group-hover:text-gray-900">
                                I commit to completing all assignments, journaling, and practical ministry activities.
                            </span>
                        </label>
                        
                        <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-purple-300 transition-all duration-300 cursor-pointer group">
                            <input type="checkbox" name="commitment_fellowship" required class="mt-1 mr-3 w-5 h-5 text-purple-600 rounded focus:ring-purple-500">
                            <span class="text-sm text-gray-700 group-hover:text-gray-900">
                                I understand this is a fellowship of the unashamed and commit to walk in boldness and purity.
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-6">
                    <button type="submit" 
                        class="w-full px-8 py-5 bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800 text-white rounded-xl font-bold text-lg transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-2xl hover:shadow-purple-500/50">
                        Submit Application
                    </button>
                    <p class="text-center text-sm text-gray-500 mt-4">
                        By submitting this form, you agree to our terms and conditions
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- What Happens Next -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-6 lg:px-20 max-w-5xl">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">What Happens Next?</h2>
            <div class="flex justify-center mb-6">
                <svg width="120" height="8" viewBox="0 0 120 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 4C10 1 20 7 30 4C40 1 50 7 60 4C70 1 80 7 90 4C100 1 110 7 119 4" stroke="#FACC15" stroke-width="3" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-purple-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <span class="text-2xl font-bold text-white">1</span>
                </div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">Application Review</h3>
                <p class="text-sm text-gray-600">We'll review your application within 5-7 business days</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <span class="text-2xl font-bold text-white">2</span>
                </div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">Interview</h3>
                <p class="text-sm text-gray-600">If selected, we'll schedule a brief phone or video interview</p>
            </div>
            
            <div class="text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <span class="text-2xl font-bold text-white">3</span>
                </div>
                <h3 class="font-bold text-lg mb-2 text-gray-900">Welcome!</h3>
                <p class="text-sm text-gray-600">Once accepted, you'll receive your welcome package and next steps</p>
            </div>
        </div>
    </div>
</section>

@endsection