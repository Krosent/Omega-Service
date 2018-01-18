<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class LoginController extends Controller
{
    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function loginFormDisplay() {
        return view('admin.login');
    }

    public function loginAttempt(Request $request) {


       if(!auth()->attempt(request((['name', 'password'])))) {
            return back()->withErrors('Были введены неверные данные');
       }
        Session::put('username', auth()->user()->getAuthIdentifierName());
       return redirect('admin');
    }

    public function logout() {
        auth()->logout();
        return redirect()->route('loginForm');
    }
}
