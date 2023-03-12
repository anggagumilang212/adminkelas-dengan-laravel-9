<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   
//login
    public function formLogin()
    {
        return view('login/login');
    }

    public function login(Request $request)
    {
        $request = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

            

        if (Auth::attempt($request)) {
            return redirect('dashboard');
        }
        return redirect()->back()->with('error', 'Username or Password Are Wrong.');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
