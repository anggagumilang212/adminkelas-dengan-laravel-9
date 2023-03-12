<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
   
//login
    public function register()
    {
        return view('login/register');
    }

    public function simpanregister(Request $request)
    {
        $request = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
            

        if (Auth::attempt($request)) {
            return redirect('login/login');
        }
        return redirect()->back()->with('error', 'Username or Password Are Wrong.');
    }

   
}
