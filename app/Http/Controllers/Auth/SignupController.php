<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function Symfony\Component\String\u;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('Signup.signup');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'national_code' => 'required|digits:10|unique:users,username',
            'mobile' => 'required|digits:11|unique:users,mobile',
            'unit_name' => 'required|string|max:255|unique:units,name',
            'email' => 'required|email|max:255|unique:units,email',
            'captcha' => 'required|captcha',
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->mobile = $request->mobile;
        $user->username = $request->national_code;
        $user->password = bcrypt($request->mobile);
        $user->type = 2;
        $user->subject = Role::findById(2)->name;
        $user->save();
        $user->assignRole(Role::findById(2)->name);

        $unit = new Unit();
        $unit->name = $request->unit_name;
        $unit->email = $request->email;
        $unit->technical_liaison = $user->id;
        $unit->save();

        return response()->json(['success' => 'You have successfully registered.']);
    }
}
