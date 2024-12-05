@extends('layouts.master')
@section('title')
    @lang('translation.password')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.profil-pengguna')
        @endslot
    @endcomponent
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="mb-0 card-title flex-grow-1">@lang('translation.password')</h5>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('default_password'))
                        <script>
                            Swal.fire({
                                icon: 'warning',
                                title: 'Ganti Password',
                                text: 'Silakan untuk ganti password terlebih dahulu!',
                                footer: '<div class="text-info fs-6"><a href="https://github.com/AbdoelMadjid" target="blank">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</a></div>'
                            });
                        </script>
                    @endif
                    <form method="POST" class="needs-validation" novalidate
                        action="{{ route('profilpengguna.update-password') }}">
                        @csrf

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

                        <div class="mb-3">
                            <label class="form-label" for="current_password">@lang('translation.current_password')</label>
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password"
                                    class="form-control pe-5 password-input @error('current_password') is-invalid @enderror"
                                    onpaste="return false" placeholder="@lang('translation.current_password')" id="current_password"
                                    aria-describedby="passwordInput" name="current_password" required>
                                <button
                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="password-input">@lang('translation.new_password')</label>
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password"
                                    class="form-control pe-5 password-input @error('new_password') is-invalid @enderror"
                                    onpaste="return false" placeholder="@lang('translation.new_password')" id="password-input"
                                    aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    name="new_password" required>
                                <button
                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label" for="password_confirmation">@lang('translation.confirm_new_password')</label>
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password"
                                    class="form-control pe-5 password-input @error('new_password_confirmation') is-invalid @enderror"
                                    onpaste="return false" placeholder="@lang('translation.confirm_new_password')" id="password_confirmation"
                                    aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    name="new_password_confirmation" required autocomplete="new-password">
                                <button
                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                @error('new_password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="gap-2 hstack justify-content-end">
                                <button type="submit" class="btn btn-primary">@lang('translation.save_changes')</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/form-validation.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/passowrd-create.init.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        function showToast(status = 'success', message) {
            iziToast[status]({
                title: status == 'success' ? 'Success' : (status == 'warning' ? 'Warning' : 'Error'),
                message: message,
                position: 'topRight',
                close: true, // Tombol close
            });
        }

        @if (session('success'))
            showToast("success", "{{ session('success') }}");
        @endif
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
