@extends('layouts.fiture')

@section('content')
<div></div>
<div class="min-h-screen py-8 bg-white">
    <div class="container max-w-6xl px-4 mx-auto">
        <div class="grid gap-6 mt-10 md:grid-cols-3">
            {{-- Sidebar: Company Information --}}
            <div class="md:col-span-1">
                <div class="h-full overflow-hidden bg-white shadow-xl rounded-2xl">
                    <div class="flex flex-col h-full p-6">
                        {{-- Company Logo --}}
                        <div class="flex justify-center mb-6">
                            <img 
                                src="{{ $job['companyLogo'] ?? 'https://via.placeholder.com/150' }}" 
                                alt="{{ $job['companyName'] ?? 'Company Logo' }}" 
                                class="object-cover w-32 h-32 border-4 border-blue-500 rounded-full shadow-lg"
                            >
                        </div>
                        {{-- Company Details --}}
                        <div class="mb-4 text-center">
                            <h2 class="mb-2 text-2xl font-bold text-gray-800">
                                {{ $job['companyName'] ?? 'Company Name' }}
                            </h2>
                            <p class="mb-2 text-sm text-gray-500">
                                {{ is_array($job['jobGeo']) ? implode(', ', $job['jobGeo']) : ($job['jobGeo'] ?? 'Global') }}
                            </p>
                        </div>
                        <div class="mt-2 text-gray-600 text-italic">
                            <p>
                                {{ $job['jobExcerpt'] ?? 'Company description not available.' }}
                            </p>
                        </div>
                        {{-- Job Metadata --}}
                        <div class="pt-4 mt-auto space-y-4 border-t">
                            <div class="flex items-center space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-gray-600">
                                    {{ is_array($job['jobType']) ? implode(', ', $job['jobType']) : ($job['jobType'] ?? 'Not Specified') }}
                                </span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-600">
                                    {{ $job['jobLevel'] ?? 'Career Level' }}
                                </span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-600">
                                    @if(isset($job['salaryCurrency']) && isset($job['annualSalaryMin']) && isset($job['annualSalaryMax']))
                                        {{ $job['salaryCurrency'] }} {{ number_format($job['annualSalaryMin']) }} - {{ number_format($job['annualSalaryMax']) }}
                                    @else
                                        Competitive Salary
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Main Content: Job Description --}}
            <div class="md:col-span-2">
                <div class="bg-white shadow-xl rounded-2xl h-[700px] flex flex-col">
                    <div class="p-6 border-b">
                        {{-- Job Title --}}
                        <h1 class="text-3xl font-extrabold leading-tight text-gray-900">
                            {{ $job['jobTitle'] ?? 'Job Title Not Available' }}
                        </h1>
                    </div>
                    {{-- Scrollable Job Description --}}
                    <div class="flex-grow p-6 overflow-y-auto">
                        <div class="prose prose-blue max-w-none">
                            <h2 class="mb-4 text-xl font-semibold text-gray-800">Job Description</h2>
                            <div class="leading-relaxed text-gray-700">
                                {!! $job['jobDescription'] ?? 'No description available.' !!}
                            </div>
                        </div>
                    </div>
                    {{-- Action Buttons --}}
                    <div class="p-6 border-t">
                        <div class="flex space-x-4">
                            <a 
                                href="{{ $job['url'] ?? '#' }}" 
                                target="_blank" 
                                class="flex-1 px-6 py-3 text-center text-white transition transform bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700 hover:-translate-y-1"
                            >
                                Apply Now
                            </a>
                            <a 
                                href="{{ url('/') }}" 
                                class="flex-1 px-6 py-3 text-center text-gray-700 transition transform bg-gray-100 rounded-lg shadow-md hover:bg-gray-200 hover:-translate-y-1"
                            >
                                Back to Jobs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection