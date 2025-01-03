@extends('layouts.fiture')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="max-w-5xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
        <!-- Profile Card -->
        <div class="mt-10 overflow-hidden bg-white shadow-xl rounded-2xl">
            <!-- Cover Image Area -->
            <div class="h-32 bg-gradient-to-r from-blue-400 to-indigo-500">
                <div class="mt-4 text-center">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $user->profile->full_name ?? $user->name }}</h1>
                    <p class="text-gray-500">{{ $user->email }}</p>
                </div>
            </div>
            
            <!-- Profile Section -->
            <div class="px-4 sm:px-6 lg:px-8 -mt-14">
                <!-- Avatar and Basic Info -->
                <div class="flex flex-col items-center sm:flex-row sm:items-end sm:space-x-6">
                    <div class="relative">
                        <div class="overflow-hidden bg-white rounded-full w-28 h-28 ring-4 ring-white">
                            <img 
                                class="object-cover w-full h-full"
                                src="{{ $user->profile->profile_picture ?? 'https://via.placeholder.com/150' }}"
                                alt="Profile Picture"
                            >
                        </div>
                        <label for="avatar-upload" class="absolute bottom-0 right-0 p-1.5 bg-indigo-500 rounded-full cursor-pointer hover:bg-indigo-600 transition-colors duration-200 shadow-lg">
                            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </label>
                        <input id="avatar-upload" type="file" class="hidden">
                        
                    </div>
                </div>

                <!-- Profile Information -->
                <div class="grid gap-6 mt-8 sm:grid-cols-2">
                    <div class="p-4 transition bg-gray-50 rounded-xl hover:bg-gray-100">
                        <p class="text-sm font-medium text-gray-500">Location</p>
                        <p class="mt-1 text-gray-900">{{ $user->profile->address ?? 'Not specified' }}</p>
                    </div>

                    <div class="p-4 transition bg-gray-50 rounded-xl hover:bg-gray-100">
                        <p class="text-sm font-medium text-gray-500">Phone</p>
                        <p class="mt-1 text-gray-900">{{ $user->profile->phone ?? 'Not specified' }}</p>
                    </div>

                    <div class="p-4 transition bg-gray-50 rounded-xl sm:col-span-2 hover:bg-gray-100">
                        <p class="text-sm font-medium text-gray-500">Bio</p>
                        <p class="mt-1 text-gray-900">{{ $user->profile->bio ?? 'No bio added yet' }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col gap-3 py-8 sm:flex-row sm:justify-end">
                    <button class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-colors duration-200 bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21H3v-3.5L16.732 3.732z" />
                        </svg>
                        Edit Profile
                    </button>
                    <button class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-medium text-white transition-colors duration-200 bg-green-600 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection