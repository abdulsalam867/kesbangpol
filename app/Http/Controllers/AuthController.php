<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
    	return view('auths.login');
    }

    public function proses_login(Request $request)
    {
    	$this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $kredensil = $request->only('email','password');

        if (Auth::attempt($kredensil)) {
            toast('Berhasil Login!','success')->width('350px');
        	return redirect('dashboard');
        }

        return redirect('login');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('login');
    }
}

