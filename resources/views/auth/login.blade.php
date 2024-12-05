@extends('layouts.master-auth')
@section('title')
    Sign In
@endsection

@section('title-content')
    <h5 class="text-primary">Welcome Back !</h5>
    <p class="text-muted">Sign in to continue to {{ $profileApp->app_nama ?? '' }}.</p>
@endsection

@section('form-content')
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                id="email" name="email" placeholder="Enter Email" required autofocus autocomplete="username">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <div class="float-end">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-muted">Forgot
                        password?</a>
                @endif
            </div>
            <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input type="password" id="password" value="{{ old('password') }}"
                    class="form-control password-input pe-5 @error('password') is-invalid @enderror" name="password"
                    placeholder="Enter password" required autocomplete="current-password">
                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
            <label class="form-check-label" for="auth-remember-check">Remember me</label>
        </div>

        <div class="mt-4">
            <button class="btn btn-success w-100" type="submit">Sign In</button>
        </div>

        <div class="mt-4 text-center">
            <div class="signin-other-title">
                <h5 class="fs-13 mb-4 title">Sign In with</h5>
            </div>
            <div>
                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i
                        class="ri-facebook-fill fs-16"></i></button>
                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i
                        class="ri-google-fill fs-16"></i></button>
                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i
                        class="ri-github-fill fs-16"></i></button>
                <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i
                        class="ri-twitter-fill fs-16"></i></button>
            </div>
        </div>
    </form>
@endsection

@section('footer-content')
    <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}"
            class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/password-addon.init.js') }}"></script>
@endsection
