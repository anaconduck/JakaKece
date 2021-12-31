<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiSistem;
use App\Models\DokumentasiSistem;
use Illuminate\Http\Request;
use App\Models\HistoryPractice;
use App\Models\HistoryTest;
use App\Models\Materi;

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
        $deskripsi = DokumentasiSistem::getDokumentasi(config('app.fitur.inkubasi'));
        return view('inkubasi',[
            'title' => 'Inkubasi Digital Bahasa',
            'inkubasi' => 'selected',
            'allCourse' => config('app.allCourse'),
            'numPengguna' => HistoryPractice::countHarian(),
            'numTaker' => HistoryTest::countHarian(),
            'numSubject' => Materi::count(),
            'allSesi' => config('app.allSesi'),
            'status' => $status,
            'nav' => $nav,
            'slides' => $slides,
            'section' => $section,
            'deskripsi' => $deskripsi
        ]);
    }
}
