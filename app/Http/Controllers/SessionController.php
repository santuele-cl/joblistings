<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        $validatedAttributes = $request->validate([
            "email"         => ["required", "email",],
            "password"      => ["required"]
        ]);


        $attempt = Auth::attempt($validatedAttributes);

        if (!$attempt) {
            throw ValidationException::withMessages(["root" => "Invalid credentials"]);
        }

        $request->session()->regenerate();


        return redirect("/jobs");
    }

    public function destroy()
    {
        Auth::logout();

        return redirect("/");
    }
}
