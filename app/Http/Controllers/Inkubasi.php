<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practice;
use App\Models\Examination;
use App\Models\HistoryExam;
use App\Models\HistoryPractice;
use App\Models\InkubasiBahasa;
use App\Models\Materi;
use App\Models\Mahasiswa;
use App\Models\Report;

class Inkubasi extends Controller
{
    public $mulai = false;

    public function index(){
        $status = 'guest';
        if(auth()->user()){
            $status = auth()->user()->status;
        }
        $nav = [
            [
                'title' => 'Inkubasi',
                'link' => url('/inkubasi')
            ]
        ];
        return view('inkubasi',[
            'title' => 'Inkubasi Digital Bahasa',
            'inkubasi' => 'selected',
            'allCourse' => config('app.allCourse'),
            'numQuest' => Practice::count(),
            'numTaker' => HistoryPractice::count(),
            'numSubject' => Materi::count(),
            'allSesi' => config('app.allSesi'),
            'status' => $status,
            'nav' => $nav
        ]);
    }
}
