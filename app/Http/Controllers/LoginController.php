<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function showLoginForm()
    {
        return view('auth.login.index');
    }

    protected function authenticated(Request $request, Auth $auth)
    {
        return redirect()->route('veiculos.index');
    }
}
