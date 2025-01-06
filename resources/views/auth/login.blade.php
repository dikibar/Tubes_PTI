@extends('layouts.auth')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-600 to-blue-800">
    <!-- Card -->
    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
        <div class="mb-3 text-center">
            <a href="{{ url('/') }}" class="text-4xl font-bold text-blue-700">
                <span class="text-yellow-300">Job</span>Finder
            </a>
            <!-- Subtitle -->
            <p class="mb-6 text-sm text-center text-gray-500">
                Login to continue your journey
            </p>
        </div>
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

            <!-- Password Input -->
            <div class="relative mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">
                    Password
                </label>
                <div class="relative">
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                        class="w-full px-4 py-2.5 bg-white border border-gray-300 text-gray-900 text-sm rounded-lg
                            focus:ring-2 focus:ring-blue-500 focus:border-blue-500 block transition-all duration-200
                            hover:border-gray-400"
                        placeholder="Enter your password"
                    >
                    <button type="button" 
                        onclick="togglePassword()"
                        class="absolute right-3 top-1/2 -translate-y-1/2 p-1.5 rounded-lg hover:bg-gray-100
                            text-gray-500 hover:text-gray-700 transition-colors duration-200
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <!-- Eye Icon (Visible) -->
                        <svg id="show-password" xmlns="http://www.w3.org/2000/svg" 
                            class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <!-- Eye Icon (Hidden) -->
                        <svg id="hide-password" xmlns="http://www.w3.org/2000/svg" 
                            class="hidden w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.012A9.97 9.97 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M3 3l18 18" />
                        </svg>
                    </button>
                </div>

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
<script>
function togglePassword() {
    const password = document.getElementById('password');
    const showIcon = document.getElementById('show-password');
    const hideIcon = document.getElementById('hide-password');
    
    if (password.type === 'password') {
        password.type = 'text';
        showIcon.classList.add('hidden');
        hideIcon.classList.remove('hidden');
    } else {
        password.type = 'password';
        showIcon.classList.remove('hidden');
        hideIcon.classList.add('hidden');
    }
}
</script>
@endsection
