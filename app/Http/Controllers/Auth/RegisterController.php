<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\UserRegistered;
use App\User;
use Validator;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:3',
            'name' => 'required|min:2'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
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
