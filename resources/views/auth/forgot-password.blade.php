@extends('layouts.master-auth')
@section('title')
    Forgot Password
@endsection

@section('title-content')
    <h5 class="text-primary">Forgot Password?</h5>
    <p class="text-muted">Reset password with {{ $profileApp->app_nama ?? '' }}</p>

    <lord-icon src="https://cdn.lordicon.com/rhvddzym.json" trigger="loop" colors="primary:#0ab39c" class="avatar-xl">
    </lord-icon>
@endsection

@section('form-content')
    <div class="alert alert-borderless alert-warning text-center mb-4 mx-2" role="alert">
        Enter your email and instructions will be sent to you!
        @if (session('status'))
            {{ session('status') }}
        @endif
        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}
    </div>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                id="email" name="email" placeholder="Enter Email" required autofocus autocomplete="username">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="text-center mt-4">
            <button class="btn btn-success w-100" type="submit">Send Reset Link</button>
        </div>
    </form><!-- end form -->
@endsection

@section('footer-content')
    <p class="mb-0">Wait, I remember my password... <a href="{{ route('login') }}"
            class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
@endsection
