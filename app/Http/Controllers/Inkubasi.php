<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiSistem;
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

    public function index(Request $request){
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
        $slides = DeskripsiSistem::getDeskripsiSistem(config('app.fitur.inkubasi'));
        $section = $request->get('s');
        
        return view('inkubasi',[
            'title' => 'Inkubasi Digital Bahasa',
            'inkubasi' => 'selected',
            'allCourse' => config('app.allCourse'),
            'numQuest' => Practice::count(),
            'numTaker' => HistoryPractice::count(),
            'numSubject' => Materi::count(),
            'allSesi' => config('app.allSesi'),
            'status' => $status,
            'nav' => $nav,
            'slides' => $slides,
            'section' => $section
        ]);
    }
}
