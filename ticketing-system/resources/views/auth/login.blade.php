@extends('layouts.app')

@section('content')
<style>
    .login-container {
        min-height: 75vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(to bottom right, #EFF6FF, #ffffff, #F3E8FF);
        padding: 1rem;
    }

    .login-box {
        max-width: 28rem;
        width: 100%;
        background: white;
        padding: 1.25rem;
        border-radius: 0.75rem;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        border: 1px solid #e5e7eb;
    }

    .title {
        text-align: center;
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(to right, #2563EB, #9333EA);
        -webkit-background-clip: text;
        color: transparent;
    }

    .subtitle {
        margin-top: 0.25rem;
        text-align: center;
        font-size: 0.875rem;
        color: #4B5563;
    }

    .form-container {
        margin-top: 2rem;
        margin-bottom: 1.5rem;
    }

    .input-group {
        border-radius: 0.375rem;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #D1D5DB;
        color: #111827;
        font-size: 0.875rem;
    }

    .form-input:focus {
        outline: none;
        border-color: #3B82F6;
        ring: 2px solid #3B82F6;
    }

    .email-input {
        border-top-left-radius: 0.375rem;
        border-top-right-radius: 0.375rem;
    }

    .password-input {
        border-bottom-left-radius: 0.375rem;
        border-bottom-right-radius: 0.375rem;
    }

    .error-text {
        color: #EF4444;
        font-size: 0.75rem;
        margin-top: 0.25rem;
    }

    .options-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 1rem 0;
    }

    .remember-me {
        display: flex;
        align-items: center;
    }

    .checkbox {
        height: 1rem;
        width: 1rem;
        color: #2563EB;
        border-radius: 0.25rem;
        border-color: #D1D5DB;
    }

    .checkbox-label {
        margin-left: 0.5rem;
        font-size: 0.875rem;
        color: #111827;
    }

    .forgot-password {
        font-size: 0.875rem;
        font-weight: 500;
        color: #2563EB;
        text-decoration: none;
    }

    .forgot-password:hover {
        color: #1D4ED8;
    }

    .submit-button {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: white;
        background: linear-gradient(to right, #2563EB, #9333EA);
        border: none;
        border-radius: 0.375rem;
        cursor: pointer;
    }

    .submit-button:hover {
        opacity: 0.9;
    }

    .lock-icon {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        padding-left: 0.75rem;
    }
</style>

<div class="login-container">
    <div class="login-box">
        <div>
            <h2 class="title">{{ __('Welcome back') }}</h2>
            <p class="subtitle">{{ __('Sign in to your account') }}</p>
        </div>
        <form class="form-container" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <input id="email" name="email" type="email" required class="form-input email-input" placeholder="Email address" value="{{ old('email') }}">
                @error('email')
                    <p class="error-text">{{ $message }}</p>
                @enderror
                
                <input id="password" name="password" type="password" required class="form-input password-input" placeholder="Password">
                @error('password')
                    <p class="error-text">{{ $message }}</p>
                @enderror
            </div>

            <div class="options-container">
                <div class="remember-me">
                    <input id="remember" name="remember" type="checkbox" class="checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" class="checkbox-label">{{ __('Remember Me') }}</label>
                </div>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

            <button type="submit" class="submit-button">
                <span class="lock-icon">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                    </svg>
                </span>
                {{ __('Sign in') }}
            </button>
        </form>
    </div>
</div>
@endsection
