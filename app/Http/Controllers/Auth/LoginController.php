<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function __construct()
    {
        $this->middleware(['guest']);
    }

    function index() {
        return view('auth.login');
    }

    function store(Request $request) {
        $this->validate($request,[
            'email'     =>   'required|email',
            'password'  =>   'required'

        ]);

        // user sign in
        if(!Auth::attempt($request->only('email','password'),$request->remember)) {
            return back()->with('status','Invalid login details.');
        }

        return redirect()->route('dashboard');
    }
}
