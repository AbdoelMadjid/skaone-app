@extends('layouts.master-auth')
@section('title')
    New Account
@endsection

@section('title-content')
    <h5 class="text-primary">Create New Account</h5>
    <p class="text-muted">Get your free {{ $profileApp->app_nama ?? '' }} account now</p>
@endsection

@section('form-content')
    <form method="POST" class="needs-validation" novalidate action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name"
                type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input class="form-control @error('email') is-invalid @enderror" id="email"
                placeholder="Enter email address" type="email" name="email" :value="old('email')" required
                autocomplete="username">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="password-input">Password</label>
            <div class="position-relative auth-pass-inputgroup">
                <input type="password" class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                    onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput"
                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" required>
                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            <div class="position-relative auth-pass-inputgroup">
                <input type="password"
                    class="form-control pe-5 password-input @error('password_confirmation') is-invalid @enderror"
                    onpaste="return false" placeholder="Enter password confirmation" id="password_confirmation"
                    aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    name="password_confirmation" required autocomplete="new-password">
                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the
                {{ $profileApp->app_nama ?? '' }} <a href="#"
                    class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                    of Use</a></p>
        </div>

        <div id="password-match" class="p-3 bg-light mb-2 rounded" style="display:none;">
            <p id="pass-match" class="fs-12 mb-0">
                <span id="pass-match-icon"></span>
                <span id="pass-match-text">Passwords do not match</span>
            </p>
        </div>


        <div id="password-contain" class="p-3 bg-light mb-2 rounded">
            <h5 class="fs-13">Password must contain:</h5>
            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
            <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)
            </p>
            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter
                (A-Z)</p>
            <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
        </div>

        <div class="mt-4">
            <button class="btn btn-success w-100" type="submit">Sign Up</button>
        </div>

        <div class="mt-4 text-center">
            <div class="signin-other-title">
                <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
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
    <p class="mb-0">Already have an account ? <a href="{{ route('login') }}"
            class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
@endsection

@section('script')
    <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/passowrd-create.init.js') }}"></script>
@endsection
