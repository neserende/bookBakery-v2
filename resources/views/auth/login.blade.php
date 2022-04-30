@extends('layouts.app')

@section('stylesToAdd')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('content')
<div class="container form-signin text-center">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <img class="mb-4" src="{{ URL::asset('images/book.gif') }}" alt="" height="200">
        <h1 class="h3 mb-3 fw-normal">Sign in</h1>
        <div class="form-floating">
            <input id="email" type="email" class="form-control form-floating @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <label for="email">Email address</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-floating">
            <input id="password" type="password" class="form-control form-floating @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <label for="password">Password</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
                     
        <div class="form-check">
            <input class="form-check-input checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
        
        <button type="submit" class="btn btn-info">
                                    {{ __('Login') }}
        </button>
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>
</div>
@endsection
