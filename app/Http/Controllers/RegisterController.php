<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){

        $attributes=request()->validate([
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:3|max:255,|unique:users,username',
            'email' => 'required|email|max:255',
            'password' => 'required|min:3|max:12|'
        ]);



        $user=User::create($attributes);

        auth()->login($user);
        return redirect( '/')->with('success','Your account has been created.');
        
    }
}
