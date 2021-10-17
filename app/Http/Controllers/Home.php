<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Home extends Controller
{
    public function home(){
        return view('home',[
            'title' => 'Home',
            'home' => 'selected'
        ]);
    }

    public function login(Request $request){
        $credential = $request->only('status','name','password');

        if(Auth::attempt($credential)){
            Auth::login(User::getUser($credential));
            $request->session()->regenerate();
            return redirect()->route('home');
        }

    }
}
