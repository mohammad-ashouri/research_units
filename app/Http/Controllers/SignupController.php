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
            'national_code' => 'required|digits:10|unique:users,national_code',
            'mobile' => 'required|digits:11|unique:users,mobile',
            'unit_name' => 'required|string|max:255|unique:units,unit_name',
            'email' => 'required|email|max:255|unique:users,email',
            'captcha' => 'required|captcha',
        ]);
        dd($request->all());
    }
}
