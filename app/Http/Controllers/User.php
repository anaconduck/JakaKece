<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\ExchangePendaftar;
use App\Models\HistoryExam;
use App\Models\HistoryJawabanPractice;
use App\Models\HistoryPractice;
use App\Models\HistoryTest;
use App\Models\InkubasiBahasa as ModelsInkubasiBahasa;
use App\Models\JawaraPendaftar;
use App\Models\Mahasiswa;
use App\Models\OjtPendaftar;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use InkubasiBahasa;

class User extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->nav = [
            [
                'title' => 'User',
                'link' => url('/user')
            ],
            [
                'title' => 'Report',
                'link' => url('/user')
            ]
            ];
    }
    public function report(Request $request, HistoryPractice $historyPractice){
        if($historyPractice->identity != auth()->user()->identity)
            abort(404);

        $now = strtotime(now());
        $test = strtotime($historyPractice->created_at);

        $course = config("app.allCourse.$historyPractice->id_course");

        if(($now - $test)/60 < config("app.totalTimeTest.$course")){
            return redirect("/latihan/$course");
        }
        session()->forget('hasListenPractice');

        if(!$historyPractice->status_selesai){
            $historyPractice->status_selesai = true;
            $historyPractice->save(['status_selesai']);
        }

        $info = [];
        switch(auth()->user()->status){
            case "mahasiswa" : {
                $info = Mahasiswa::find(auth()->user()->identity);
                break;
            }
            case "dosen" : {
                $info = Dosen::find(auth()->user()->identity);
                break;
            }
            default : {
                abort(404);
            }
        }
        $historyJawaban = HistoryJawabanPractice::showHistoryJawaban($historyPractice->id);
        array_push($this->nav,[
            'title' => 'Report '. $historyPractice->id,
            'link' => url('/report/practice')."/$historyPractice->id"
        ]);
        return view('report',[
            'title' => 'Report',
            'user_s' => 'selected',
            'course' => $course,
            'info' => $info,
            'history' => $historyPractice,
            'report' => $historyJawaban,
            'nav' => $this->nav,
        ]);
    }

    public function index(){
        $user = auth()->user();
        $mahasiswa = Mahasiswa::find($user->identity);
        $report = HistoryPractice::allWithIdentity($user->identity);
        $reportTest = HistoryTest::riwayat($user->identity);
        $jawara = JawaraPendaftar::riwayat(auth()->user()->identity);
        $exchange = ExchangePendaftar::riwayat($user->identity);
        $ojt = OjtPendaftar::riwayat($user->identity);
        array_pop($this->nav);
        return view('user',[
            'title' => 'User',
            'user_s' => 'selected',
            'user' => $user,
            'mahasiswa' => $mahasiswa,
            'jawara' => $jawara,
            'data' => $report,
            'nav' => $this->nav,
            'reportTest' => $reportTest,
            'exchange' => $exchange,
            'ojt' => $ojt
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');
    }
}
