<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only('create');
    }

    /**
     * Logs out user
     */
    public function destroy()
    {
        auth()->logout();

       return redirect()->route('home');
    }

    /**
     * Show login form
     */
    public function create()
    {
        return view('session.create');
    }

    /**
     * Logs user in
     */
    public function store()
    {
        //dd(request()->all());
        if (! auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                    'message' => 'Your credentials are invalid'
                ])->withInput();
        }

        return redirect()->route('home');
    }
}
