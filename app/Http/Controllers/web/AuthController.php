<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use AuthenticatesUsers , RegistersUsers;

    public function showLoginForm()
    {
        return view('auth.web.login',[
            'title' => 'login',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.web.register',[
            'title' => 'Register',
        ]);
    }

    protected function guard()
    {
        return Auth::guard('user');
    }

    public function redirectTo()
    {
        return route('web.home');
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('web.login'));
    }    


    public function validator($request)
    {
        return Validator::make($request, [
            "name"     =>   ['required'],
            "email"     =>     ['required', 'unique:users,email'],
            "password"      =>     ['required'],
            "confirm_password"      =>  ['required','same:password'],
        ]);
    }

    public function create(array $request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
    }

}
