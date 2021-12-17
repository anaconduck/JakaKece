<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dashboard;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class Home extends Controller
{

    public function home(){
        $berita = Berita::showBertita();
        $top = Berita::topBerita();
        $dashboard = Dashboard::first();
        if($dashboard->background)
            $dashboard->background = json_decode($dashboard->background, true);
        else $dashboard->background = [];
        if($dashboard->tentangAplikasi)
            $dashboard->tentangAplikasi = json_decode($dashboard->tentangAplikasi, true);
        else $dashboard->tentangAplikasi = [];
        return view('home',[
            'title' => 'Home',
            'home' => 'selected',
            'berita' => $berita,
            'top' => $top,
            'dashboard' => $dashboard
        ]);
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

    public function forgotPassword(){
        return view('forgot-password');
    }
    public function sendResetLink(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword($token){
        return view('reset-password');
    }

    public function handlingResetPassword(Request $request){
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email','password','password_confirmation','token'),
            function($user, $password){
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('home')->with('status',__($status))
            : back()->withErrors(['email' => __($status)]);
    }

}
