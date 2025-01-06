@extends('layouts.auth')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-600 to-blue-800">
    <div class="shadow-lg card" style="width: 24rem; border-radius: 10px;">
        <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
            <div class="mb-3 text-center">
                <a href="{{ url('/') }}" class="text-4xl font-bold text-blue-700">
                    <span class="text-yellow-300">Job</span>Finder
                </a>
                <!-- Subtitle -->
                <p class="mb-6 text-sm text-center text-gray-500">
                    Reset your password
                </p>
            </div>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <form class="max-w-sm mx-auto" action="{{ route('password.email') }}" method="POST">
                @csrf
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Email Address') }}</label>
                <div class="relative mb-1">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                        <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                        <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                        </svg>       
                    </div>
                    <input type="text" id="email" placeholder="Your Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  @error  ('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-6 text-center">
                    <button type="button" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M2.82 2.82a1 1 0 0 1 1.267-.327l18 8a1 1 0 0 1 0 1.82l-18 8A1 1 0 0 1 2 19.5V13L12 12 2 11V4.5a1 1 0 0 1 .82-.68ZM4 6.802v3.524l5.77.575a1 1 0 0 1 0 1.994L4 13.47v3.525L19.382 12 4 6.802Z"/>
                        </svg>
                        {{ __('Send Password Reset Link') }}
                    </button>                        
                </div>
            </form>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
{{-- 
                <div class="gap-2 d-grid">
                    <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                </div> --}}
            </form>
        </div>
    </div>
</div>
@endsection
