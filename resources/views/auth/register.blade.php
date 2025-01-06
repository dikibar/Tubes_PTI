@extends('layouts.auth')

@section('content')
<script src="auth.js"></script>
<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-br from-blue-600 to-blue-800">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md ">
        <div class="mb-3 text-center">
          <a href="{{ url('/') }}" class="text-4xl font-bold text-blue-700">
            <span class="text-yellow-300">Job</span>Finder
          </a>
          <!-- Subtitle -->
          <p class="mb-6 text-sm text-center text-gray-500">
              Register to continue your journey
          </p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex mb-4 space-x-4">
              <!-- First Name -->
              <div class="w-1/2">
                  <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                  <input id="first_name" type="text" name="first_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg @error('first_name') @enderror" value="{{ old('first_name') }}" required autofocus>
                  @error('first_name')
                      <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                  @enderror
              </div>
          
              <!-- Last Name -->
              <div class="w-1/2">
                  <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                  <input id="last_name" type="text" name="last_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg @error('last_name') @enderror" value="{{ old('last_name') }}" required>
                  @error('last_name')
                      <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                  @enderror
              </div>
          </div>
          
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" type="email" class="w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('email') @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                
                @error('email')
                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
              <div class="relative">
                  <input 
                      id="password" 
                      type="password" 
                      name="password" 
                      required 
                      autocomplete="new-password"
                      class="w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 
                            @error('password') @enderror"
                  >
                  <button 
                      type="button" 
                      onclick="togglePassword('password')"
                      class="absolute text-gray-500 -translate-y-1/2 right-3 top-1/2 hover:text-gray-700">
                      <svg class="w-5 h-5 show-password-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      <svg class="hidden w-5 h-5 hide-password-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.012A9.97 9.97 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                      </svg>
                  </button>
              </div>
              @error('password')
                  <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
              <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirm Password</label>
              <div class="relative">
                  <input 
                      id="password-confirm" 
                      type="password" 
                      name="password_confirmation" 
                      required 
                      autocomplete="new-password"
                      class="w-full px-4 py-2 text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                  >
                  <button 
                      type="button" 
                      onclick="togglePassword('password-confirm')"
                      class="absolute text-gray-500 -translate-y-1/2 right-3 top-1/2 hover:text-gray-700">
                      <svg class="w-5 h-5 show-password-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      <svg class="hidden w-5 h-5 hide-password-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.012A9.97 9.97 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                      </svg>
                  </button>
              </div>
            </div>
            <!-- Submit Button -->
            <div class="flex justify-center mb-0">
                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
<script>
  function togglePassword(inputId) {
      const input = document.getElementById(inputId);
      const parent = input.parentElement;
      const showIcon = parent.querySelector('.show-password-icon');
      const hideIcon = parent.querySelector('.hide-password-icon');
      
      if (input.type === 'password') {
          input.type = 'text';
          showIcon.classList.add('hidden');
          hideIcon.classList.remove('hidden');
      } else {
          input.type = 'password';
          showIcon.classList.remove('hidden');
          hideIcon.classList.add('hidden');
      }
  }
</script>

@endsection
