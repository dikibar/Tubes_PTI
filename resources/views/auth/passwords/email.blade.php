@extends('layouts.auth')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="shadow-lg card" style="width: 24rem; border-radius: 10px;">
        <div class="p-4 card-body">
            <div class="mb-4 text-center">
                <h2 class="sitename text-primary" style="font-size: 20px; font-weight: bold;">BetterJobs</h2>
                <p class="text-secondary">{{ __('Reset Your Password') }}</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="gap-2 d-grid">
                    <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
