<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{



    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);
        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Wrong e-mail adress!',
                'password' => 'Incorect password!'
            ]);
        }
        session()->regenerate();
        return redirect('/')->with('sucess', 'Welcome');



        //return back()->withErrors('Wrong data!');

    }
    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'You are logged out.');
    }
}
