<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /*
     * Show registration form
     */
    public function create()
    {
        return view('registration.create');
    }

    /**
     * Register user
     */
    public function store()
    {
        //validate request data
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:3',
            'name' => 'required|min:2'
        ]);

        //create user
        $user = User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'name' => request('email')
        ]);

        //log in user | we can use facade auth also
        auth()->login($user);

        //redirect to home
        return redirect()->route('home');
    }
}
