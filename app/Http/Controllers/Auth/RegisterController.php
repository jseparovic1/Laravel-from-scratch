<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Mail\UserRegistered;
use App\User;
use Illuminate\Support\Facades\Mail;


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
    public function store(RegisterUser $request)
    {
        //create user
        $user = User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'name' => request('email')
        ]);

        //log in user | we can use facade auth also
        \Auth::login($user);

        //send welcome email to user
        Mail::to($user)->send(new UserRegistered($user));

        //redirect to home
        return redirect()->route('home');
    }
}
