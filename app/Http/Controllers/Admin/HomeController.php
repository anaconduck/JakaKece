<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JawaraEvent;
use App\Models\Materi;
use App\Models\OJT;
use App\Models\StudentExchange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index(){
        return view('admin.home',[
            'title' => 'HomePage',
            'num_materi' => Materi::count(),
            'num_event_jawara' => JawaraEvent::count(),
            'num_se_event' => StudentExchange::count(),
            'num_ojt_event' => OJT::count()
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');
    }
}
