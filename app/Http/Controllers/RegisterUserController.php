<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {

        /** 1) Validate Request */
        $validatedAttributes = $request->validate([
            "first_name"    => ["required", "min:3"],
            "last_name"     => ["required", "min:3"],
            "email"         => ["required", "email",],
            "password"      => ["required", Password::min(6), "confirmed"]
            /**if 'confirmed' is set
         * laravel will look for password_confirmation (in this case)
         * field then check if both password match
         * in case of email -> email_confirmation
         * */
        ]);

        /** 2) Create User */
        $user = User::create($validatedAttributes);

        /** 3) Log the user */
        Auth::login($user);

        /** 4) Redirect */
        return redirect("/jobs");
    }
}
