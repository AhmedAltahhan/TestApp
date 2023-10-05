<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{


    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function login(){
        return view('Web.Auth.login');
    }

    public function checklogin(LoginRequest $request)
    {
        $credentials =[
            'username' => str()->lower($request->username),
            'password'=> $request->password,];
        if(Auth::attempt($credentials))
        {
            $user = Auth::user();
            if($user -> type =='admin')
            {
                return redirect()->route('profile.index');
            }
            else
                return redirect()->route('information.index' , compact('user'));
        }
        return view('Web.Auth.login');
    }
}
