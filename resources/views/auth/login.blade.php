@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="auth-container">
    <!-- Left Side - Branding -->
    <div class="auth-left">
        <div class="auth-logo">
            <i class="fas fa-leaf"></i>
        </div>
        <h1 class="auth-brand">BeeswaxApp</h1>
        <p class="auth-tagline">
            Solusi inovatif sedotan ramah lingkungan dengan lapisan beeswax alami. 
            Tetap praktis seperti plastik, namun 100% biodegradable.
        </p>
    </div>

    <!-- Right Side - Login Form -->
    <div class="auth-right">
        <div class="auth-header">
            <h2 class="auth-title">Welcome Back!</h2>
            <p class="auth-subtitle">Sign in to your account to continue</p>
        </div>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Display session status -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" 
                       id="email" 
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="Enter your email address"
                       required 
                       autofocus>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                       id="password"
                       name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Enter your password"
                       required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-check">
                <input type="checkbox" 
                       id="remember" 
                       name="remember" 
                       class="form-check-input">
                <label for="remember" class="form-check-label">
                    Remember me for 30 days
                </label>
            </div>
            
            <button type="submit" class="btn-primary">
                <i class="fas fa-sign-in-alt" style="margin-right: 0.5rem;"></i>
                Sign In
            </button>
        </form>
        
        <div class="auth-links">
            <p style="margin-bottom: 1rem; color: #666;">
                Don't have an account? 
                <a href="{{ route('register') }}" class="auth-link">Create Account</a>
            </p>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="auth-link">
                    Forgot your password?
                </a>
            @endif
        </div>
    </div>
</div>
@endsection