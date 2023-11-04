<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
            'title' => 'Login',
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
        return Auth::guard('web');
    }

    public function redirectTo()
    {
        return route('web.home');
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('web.login'));
    }

    public function create($request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' =>Hash::make($request['password']),
        ]);
    }

    public function validator($request)
    {
        return Validator::make($request, [
            "name"     =>   ['required'],
            "email"     =>     ['required', 'unique:users,email'],
            "password"      =>     ['required'],
            "password_confirm"      =>  ['required','same:password'],
        ]);
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $this->validator($request->all())->validate();

        // Create a new user
        $user = $this->create($request->all());

        // Fire the Registered event
        event(new Registered($user));

        // Log in the newly registered user
        auth()->login($user);

        // Check for custom response (you may want to implement this method)
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        // Return a response based on the client's request type
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

}
