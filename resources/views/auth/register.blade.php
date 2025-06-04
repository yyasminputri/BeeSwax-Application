@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="auth-container">
    <!-- Left Side - Branding -->
    <div class="auth-left">
        <div class="auth-logo">
            <i class="fas fa-leaf"></i>
        </div>
        <h1 class="auth-brand">BeeswaxApp</h1>
        <p class="auth-tagline">
            Bergabunglah dengan gerakan ramah lingkungan. 
            Buat akun dan mulai menggunakan sedotan beeswax yang inovatif!
        </p>
    </div>

    <!-- Right Side - Register Form -->
    <div class="auth-right">
        <div class="auth-header">
            <h2 class="auth-title">Create Account</h2>
            <p class="auth-subtitle">Join us in making the world greener</p>
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

        <form class="auth-form" method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" 
                       id="name" 
                       name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       placeholder="Enter your full name"
                       required 
                       autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" 
                       id="email" 
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="Enter your email address"
                       required>
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
                       placeholder="Create a strong password"
                       required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" 
                       id="password_confirmation"
                       name="password_confirmation"
                       class="form-control"
                       placeholder="Confirm your password"
                       required>
            </div>
            
            <button type="submit" class="btn-primary">
                <i class="fas fa-user-plus" style="margin-right: 0.5rem;"></i>
                Create Account
            </button>
        </form>
        
        <div class="auth-links">
            <p style="color: #666;">
                Already have an account? 
                <a href="{{ route('login') }}" class="auth-link">Sign In</a>
            </p>
        </div>
    </div>
</div>
@endsection