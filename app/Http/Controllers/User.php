<?php

namespace App\Http\Controllers;

use App\Models\HistoryExam;
use App\Models\Mahasiswa;
use App\Models\Report;
use Illuminate\Http\Request;

class User extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function report($historyid){
        $mhs_id = Mahasiswa::getMahasiswa()->id;
        $report = Report::getReport($mhs_id,$historyid);

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
            'testDate' => HistoryExam::getHistoryExam($mhs_id,$report->id)->created_at,
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
}
