<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function auth_error_404_alt()
    {
        return view('template.auth.auth-error-404-alt');
    }
    public function auth_error_404_basic()
    {
        return view('template.auth.auth-error-404-basic');
    }
    public function auth_error_404_cover()
    {
        return view('template.auth.auth-error-404-cover');
    }
    public function auth_error_500()
    {
        return view('template.auth.auth-error-500');
    }
    public function auth_error_offline()
    {
        return view('template.auth.auth-error-offline');
    }
    public function auth_lockscreen_basic()
    {
        return view('template.auth.auth-lockscreen-basic');
    }
    public function auth_lockscreen_cover()
    {
        return view('template.auth.auth-lockscreen-cover');
    }
    public function auth_logout_basic()
    {
        return view('template.auth.auth-logout-basic');
    }
    public function auth_logout_cover()
    {
        return view('template.auth.auth-logout-cover');
    }
    public function auth_pass_change_basic()
    {
        return view('template.auth.auth-pass-change-basic');
    }
    public function auth_pass_change_cover()
    {
        return view('template.auth.auth-pass-change-cover');
    }
    public function auth_pass_reset_basic()
    {
        return view('template.auth.auth-pass-reset-basic');
    }
    public function auth_pass_reset_cover()
    {
        return view('template.auth.auth-pass-reset-cover');
    }
    public function auth_signin_basic()
    {
        return view('template.auth.auth-signin-basic');
    }
    public function auth_signin_cover()
    {
        return view('template.auth.auth-signin-cover');
    }
    public function auth_signup_basic()
    {
        return view('template.auth.auth-signup-basic');
    }
    public function auth_signup_cover()
    {
        return view('template.auth.auth-signup-cover');
    }
    public function auth_success_msg_basic()
    {
        return view('template.auth.auth-success-msg-basic');
    }
    public function auth_success_msg_cover()
    {
        return view('template.auth.auth-success-msg-cover');
    }
    public function auth_twostep_basic()
    {
        return view('template.auth.auth-twostep-basic');
    }
    public function auth_twostep_cover()
    {
        return view('template.auth.auth-twostep-cover');
    }
}
