<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('Signup.signup');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'national_code' => 'required|integer|max:10',
            'mobile' => 'required|integer|max:11',
            'unit_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'captcha' => 'required|captcha',
        ]);
    }
}
