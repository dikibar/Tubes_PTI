@extends('layouts.main')

@section('content')

    <link rel="stylesheet" href="css/ticker.css">

    {{-- <section class="relative text-white verflow-hidden bg-gradient-to-br from-blue-600 to-blue-700">
    <!-- Background Decoration -->
    <div class="absolute inset-0">
        <div class="absolute rounded-full w-96 h-96 bg-blue-300/30 blur-3xl -top-10 -left-20"></div>
        <div class="absolute rounded-full w-80 h-80 bg-purple-300/20 blur-2xl bottom-10 right-10"></div>
    </div>

    <div class="container relative z-10 px-6 mx-auto lg:px-12">
        <!-- Hero Content -->
        <div class="flex flex-col items-center gap-6 py-12 lg:flex-row lg:gap-12">
            <!-- Left Section -->
            <div class="space-y-6 text-center lg:text-left animate-fade-in-left">
                <div class="inline-block px-4 py-2 text-sm rounded-full bg-white/10 backdrop-blur-sm">
                    <span class="text-blue-200">New</span> Remote Job Platform
                </div>
                
                <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl xl:text-6xl">
                    Find Your <span class="text-blue-300 break-words">Dream Career</span>
                </h1>
                
                <p class="max-w-xl mx-auto text-lg text-blue-100 lg:mx-0 opacity-90">
                    Unlock endless possibilities with our cutting-edge job discovery platform. Connect with global opportunities tailored just for you.
                </p>
                
                <div class="flex flex-col justify-center gap-4 sm:flex-row lg:justify-start">
                    <a href="#filter" class="flex items-center justify-center gap-2 px-6 py-3 text-base font-semibold text-blue-600 transition duration-300 bg-white rounded-lg shadow-lg hover:bg-gray-100 hover:shadow-xl group">
                        Start Searching
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform lucide lucide-search group-hover:rotate-12">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a>
                    <a href="#how-it-works" class="flex items-center justify-center gap-2 px-6 py-3 text-base font-semibold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
                        How It Works
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Section -->
            <div class="relative max-w-lg">
                <img 
                    src="img/image.png" 
                    alt="Hero Image" 
                    class="w-full h-auto animate-floating"
                >
            </div>

            <!-- CSS -->
            <style>
                @keyframes floating {
                    0%, 100% {
                        transform: translateY(0);
                    }
                    50% {
                        transform: translateY(-15px); /* Naik 15px */
                    }
                }

                .animate-floating {
                    animation: floating 3s ease-in-out infinite; /* Animasi berjalan terus */
                }
            </style>
        </div>
    </div>

    <!-- Wave Bottom Border -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
        <svg 
            class="relative block w-full h-[80px]" 
            xmlns="http://www.w3.org/2000/svg" 
            viewBox="0 0 1200 120" 
            preserveAspectRatio="none"
        >
        <path 
        d="M0,100 C200,150 400,50 600,100 C800,150 1000,50 1200,100 L1200,120 L0,120 Z" 
        fill="#ffffff"
    />
    
        </svg>
    </div>
</section> --}}
    {{-- INI HEADER     --}}
    <x-header :jobCount2="$jobCount"></x-header>
    

    @if (!$jobtitle && !$jobType && !$jobIndustry && !$jobLevel)
        <div class=" px-4 py-8 mx-auto  bg-white" id="company">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-gray-800">Company Partner</h2>
                <p class="text-lg text-gray-600">Explore top companies offering remote job opportunities</p>
            </div>
            {{-- Logo ticker --}}
            <div class="container px-4 py-8 mx-auto">
                <div class="logo-ticker">
                    <div class="logo-track">
                        @foreach ($uniqueLogos as $job)
                            <div class="flex-shrink-0 mx-2 my-2">
                                <img src="{{ $job['companyLogo'] }}" alt="{{ $job['companyName'] }}"
                                    class="object-contain w-16 h-16 transition-transform rounded-lg shadow-md hover:scale-110 sm:w-14 sm:h-14 md:w-20 md:h-20 lg:w-24 lg:h-24">
                            </div>
                        @endforeach
                    </div>
                    <div class="logo-track">
                        @foreach ($uniqueLogos as $job)
                            <div class="flex-shrink-0 mx-2 my-2">
                                <img src="{{ $job['companyLogo'] }}" alt="{{ $job['companyName'] }}"
                                    class="object-contain w-16 h-16 transition-transform rounded-lg shadow-md hover:scale-110 sm:w-14 sm:h-14 md:w-20 md:h-20 lg:w-24 lg:h-24">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Job Filter -->
    <div class="flex justify-center py-8 bg-white " id="filter">
        <form method="GET" action="{{ route('index') }}#filter"
            class="w-full max-w-4xl p-6 space-y-4 bg-white rounded-lg drop-shadow sm:space-y-0 sm:space-x-4 sm:flex sm:items-center">

            <!-- Job Title Search -->
            <div class="relative flex items-center w-full sm:w-auto">
                <svg class="absolute w-5 h-5  text-gray-400 left-3" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" name="jobtitle" placeholder="Search job title..." value="{{ $jobtitle ?? '' }}"
                    class="w-full py-2 pl-10 pr-4 text-sm bg-slate-50 text-gray-700 transition duration-200 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white" />
            </div>

            <!-- Job Type Filter -->
            <div class="relative flex items-center w-full sm:w-auto">
                <select name="job_type"
                    class="w-full py-2 pl-4 pr-10 text-sm text-gray-700 transition duration-200 bg-slate-50 border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                    <option value="">Job Type</option>
                    <option value="full-time" {{ strtolower($jobType) == 'full-time' ? 'selected' : '' }}>Full-time
                    </option>
                    <option value="part-time" {{ strtolower($jobType) == 'part-time' ? 'selected' : '' }}>Part-time
                    </option>
                    <option value="contract" {{ strtolower($jobType) == 'contract' ? 'selected' : '' }}>Contract</option>
                    <option value="internship" {{ strtolower($jobType) == 'internship' ? 'selected' : '' }}>Internship
                    </option>
                </select>
                <svg class="absolute w-5 h-5 text-gray-400 pointer-events-none right-3" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                </svg>
            </div>

            <!-- Job Industry Filter -->
            <div class="relative flex items-center w-full sm:w-auto">
                <select name="job_industry"
                    class="w-full py-2 pl-4 pr-10 text-sm text-gray-700 transition duration-200 bg-slate-50 border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                    <option value="">Industry</option>

                    <!-- Technology Group -->
                    <optgroup label="Technology">
                        <option value="Software Engineering"
                            {{ strtolower($jobIndustry) == 'software engineering' ? 'selected' : '' }}>Software Engineering
                        </option>
                        <option value="DevOps &amp; SysAdmin"
                            {{ strtolower($jobIndustry) == 'devops & sysadmin' ? 'selected' : '' }}>DevOps &amp; SysAdmin
                        </option>
                        <option value="Programming" {{ strtolower($jobIndustry) == 'programming' ? 'selected' : '' }}>
                            Programming</option>
                        <option value="Data Science" {{ strtolower($jobIndustry) == 'data science' ? 'selected' : '' }}>
                            Data Science</option>
                        <option value="Technical Support"
                            {{ strtolower($jobIndustry) == 'technical support' ? 'selected' : '' }}>Technical Support
                        </option>
                    </optgroup>

                    <!-- Finance Group -->
                    <optgroup label="Finance">
                        <option value="Finance &amp; Legal"
                            {{ strtolower($jobIndustry) == 'finance & legal' ? 'selected' : '' }}>Finance &amp; Legal
                        </option>
                    </optgroup>

                    <!-- Marketing Group -->
                    <optgroup label="Marketing">
                        <option value="Social Media Marketing"
                            {{ strtolower($jobIndustry) == 'social media marketing' ? 'selected' : '' }}>Social Media
                            Marketing</option>
                        <option value="Copywriting &amp; Content"
                            {{ strtolower($jobIndustry) == 'copywriting & content' ? 'selected' : '' }}>Copywriting &amp;
                            Content</option>
                        <option value="Marketing &amp; Sales"
                            {{ strtolower($jobIndustry) == 'marketing & sales' ? 'selected' : '' }}>Marketing &amp; Sales
                        </option>
                    </optgroup>

                    <!-- Sales Group -->
                    <optgroup label="Sales">
                        <option value="Sales" {{ strtolower($jobIndustry) == 'sales' ? 'selected' : '' }}>Sales</option>
                    </optgroup>

                    <!-- Design Group -->
                    <optgroup label="Design">
                        <option value="Design &amp; Creative"
                            {{ strtolower($jobIndustry) == 'design & creative' ? 'selected' : '' }}>Design &amp; Creative
                        </option>
                        <option value="Web &amp; App Design"
                            {{ strtolower($jobIndustry) == 'web & app design' ? 'selected' : '' }}>Web &amp; App Design
                        </option>
                    </optgroup>
                </select>
                <svg class="absolute w-5 h-5 text-gray-400 pointer-events-none right-3" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                </svg>
            </div>



            <!-- Job Level Filter -->
            <div class="relative flex items-center w-full sm:w-auto">
                <select name="job_level"
                    class="w-full py-2 pl-4 pr-10 text-sm text-gray-700 transition duration-200 bg-slate-50 border border-gray-300 rounded-lg appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                    <option value="">Level</option>
                    <option value="any" {{ strtolower($jobLevel) == 'any' ? 'selected' : '' }}>Any</option>
                    <option value="senior" {{ strtolower($jobLevel) == 'senior' ? 'selected' : '' }}>Senior</option>
                    <option value="director" {{ strtolower($jobLevel) == 'director' ? 'selected' : '' }}>Director</option>
                    <option value="Junior, Midweight, Senior"
                        {{ strtolower($jobLevel) == 'junior-midweight' ? 'selected' : '' }}>Junior - Midweight</option>
                </select>
                <svg class="absolute w-5 h-5 text-gray-400 pointer-events-none right-3" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                </svg>
            </div>
            <!-- Filter Button -->
            <button type="submit"
                class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white transition duration-200 bg-blue-500 rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="mr-2">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                </svg>
                Filter
            </button>
        </form>
    </div>

    {{-- job list --}}
    <x-job :jobs="$jobs"></x-job>


    <!-- Call to Action Section -->
    @guest
        <section class="py-12 text-white bg-gradient-to-r from-blue-600 to-blue-700">
            <div class="container px-6 mx-auto text-center">
                <!-- Judul -->
                <h2 class="mb-4 text-3xl font-bold leading-snug md:text-4xl animate-fade-in">
                    Take the First Step Towards Your Dream Career
                </h2>

                <!-- Subjudul -->
                <p class="mb-6 text-base font-light delay-200 md:text-lg opacity-90 animate-fade-in">
                    Thousands of opportunities are waiting for you. Don’t miss out!
                </p>

                <!-- Tombol CTA -->
                <div class="flex justify-center gap-3">
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 text-base font-medium text-indigo-700 transition duration-300 bg-white rounded-full shadow-lg hover:bg-gray-100 hover:shadow-xl hover:-translate-y-1">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2 text-base font-medium transition duration-300 bg-yellow-400 rounded-full shadow-lg text-indigo-50 hover:bg-yellow-300 hover:shadow-xl hover:-translate-y-1">
                        Register
                    </a>
                </div>
            </div>
        </section>
    @endguest


    {{-- Chatbot --}}
    <x-chatbot></x-chatbot>
@endsection
