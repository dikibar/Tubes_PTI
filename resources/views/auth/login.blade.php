@extends('layouts.auth')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-600 to-blue-800">
    <!-- Card -->
    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
        <!-- Title -->
        <h2 class="mb-6 text-2xl font-extrabold text-center text-blue-700">
            Welcome Back!
        </h2>
        
        <!-- Subtitle -->
        <p class="mb-6 text-sm text-center text-gray-500">
            Login to continue your journey
        </p>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email" 
                    autofocus
                    class="w-full px-4 py-3 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    class="w-full px-4 py-3 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                @error('password')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-4">
                <label class="flex items-center">
                    <input 
                        type="checkbox" 
                        name="remember" 
                        {{ old('remember') ? 'checked' : '' }}
                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm text-gray-600">Remember Me</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <button 
                type="submit" 
                class="w-full px-4 py-3 text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
                Login
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="mx-4 text-sm text-gray-500">OR</span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-sm text-gray-600">Don't have an account?</p>
            <a href="{{ route('register') }}" class="text-sm font-medium text-blue-600 hover:underline">
                Register Here
            </a>
        </div>
    </div>
</div>
@endsection
