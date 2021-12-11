<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'identity' => 'bail|required',
            'password' => 'bail|required'

        ]);

        $credential = $request->only('identity','password');
        if(Auth::attempt($credential)){
            Auth::login(User::getUser($credential));
            $request->session()->regenerate();
            if(auth()->user()->status === 'admin')
                return redirect()->route('admin.home');
            else if(auth()->user()->status === 'mahasiswa')
                $request->session()->put('prodi',Mahasiswa::currentMahasiswa()->program_studi);
            return redirect()->route('home')->with('error','Account not found!');
        }

        return redirect('home')->with('error','Credential Invalid!');
    }
}
