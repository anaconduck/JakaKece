<?php

namespace App\Http\Controllers;

use App\Models\HistoryExam;
use App\Models\Mahasiswa;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','user']);
    }
    public function report($reportID){
        $mhs_id = Mahasiswa::getMahasiswa()->id;
        $report = Report::getReportFromID($reportID);
        if(!$report){
            return $this->index();
        }

        $total = 10* (
            $report->score_listening +
            $report->score_writing +
            $report->score_reading
        );


        return view('report',[
            'title' => 'Report',
            'report' => $report,
            'total' => $total,
            'testDate' => HistoryExam::getHistoryExam($mhs_id,$report->history_exam_id)->created_at,
            'user' => auth()->user(),
            'user_s' => 'selected'
        ]);
    }

    public function index(){
        $mhs = Mahasiswa::getMahasiswa();
        $reports = Report::getAllReports($mhs->id)??[];
        $numTOEFL = 0;
        $numIELTS = 0;
        if($reports){
            $numTOEFL = $reports->where('type','TOEFL')->count();
            $numIELTS = $reports->where('type','IELTS')->count();
        }
        return view('user',[
            'title' => 'User',
            'reports' => $reports,
            'user' => $mhs,
            'numTOEFL' => $numTOEFL,
            'numIELTS' => $numIELTS,
            'user_s' => 'selected'
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('home');
    }
}
