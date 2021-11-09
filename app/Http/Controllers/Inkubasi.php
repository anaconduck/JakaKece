<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practice;
use App\Models\Examination;
use App\Models\HistoryExam;
use App\Models\InkubasiBahasa;
use App\Models\Materi;
use App\Models\Mahasiswa;
use App\Models\Report;

class Inkubasi extends Controller
{
    public $mulai = false;

    public function __construct()
    {
        $this->middleware(['auth','user']);
    }
    public function index(){
        $data = InkubasiBahasa::getAllCourse();
        $opsiToeflItp = Materi::getAllMateri($data[0]->id_course);
        $opsiToeflIbt = Materi::getAllMateri($data[1]->id_course);
        $opsiToeic = Materi::getAllMateri($data[2]->id_course);
        $opsiIelts = Materi::getAllMateri($data[3]->id_course);
        return view('inkubasi',[
            'title' => 'Inkubasi',
            'inkubasi' => 'selected',
            'data' => $data,
            'ind' => 0,
            'opsiitp' => $opsiToeflItp,
            'opsiibt' => $opsiToeflIbt,
            'opsitoeic' => $opsiToeic,
            'opsiielts' => $opsiIelts
        ]);
    }

    public function infoPengguna(){
        return view('inkubasi1',[
            'title' => 'Info Pengguna',
            'inkubasi' => 'selected'
        ]);
    }

    public function mulaiLatihan(Request $request, $type){

        return $this->latihanSoal($request, $type);
    }

    public function latihanSoal(Request $request, $type='TOEFL-ITP',$kategori= 'Reading', $id=1){
        $historyid = 0;
        $testTime = 0;
        $type = strtoupper($type);
        if(! $this->mulai){
            $this->mulai = true;
            $lastExam = HistoryExam::getLastHistoryExam($type);
            $start = strtotime($lastExam->created_at);
            $now = strtotime(now());
            $diff = $now-$start;
            if($diff >= 125*60){
                if(url()->previous() !== url('/')."/inkubasi"){
                    return redirect(url("/inkubasi"));
                }
                $lastExam = HistoryExam::make($type);
                $kategori = 'READING';
                $id = 1;
                $request->session()->forget('jawaban');
            }
            else if($diff >= 100 * 60 and $diff < 125*60){
                $kategori = 'Writing';
                $testTime = 125*60-$diff;
            }
            else if($diff >= 65*60 and $diff < 100 * 60){
                $kategori = 'Listening';
                $testTime = 100*60 - $diff;
            }
            else if($diff>= 55 * 60 and $diff < 65*60){
                $id = 'pre';
                $testTime = 65*60 - $diff;
                return view('pre-test-listening',[
                    'title' => 'Latihan ' .$kategori,
                    'inkubasi' => 'selected',
                    'type' => strtoupper($type),
                    'kategori' => 'LISTENING',
                    'testTime' => $testTime
                ]);
            }
            else if($diff <= 55 * 60){
                $kategori = 'Reading';
                $testTime = 55*60 - $diff;
            }
            $historyid = $lastExam->id;
        }

        if(! is_numeric($id))
            $id = 1;

        $viewName= '';
        $params = [
            'title' => 'Latihan ' .$kategori,
            'inkubasi' => 'selected',
            'type' => strtoupper($type),
            'kategori' => $kategori = strtoupper($kategori),
            'num' => Practice::countCategory($type, $kategori),
            'request' => $request,
            'history_id' => $historyid,
            'testTime' => $testTime
        ];

        if($id > $params['num'])
            $id = 1;

        switch($kategori){
            case 'READING':{
                $viewName = 'practice'; break;
            }
            case 'LISTENING' :{
                $viewName = 'listening';break;
            }
            case 'WRITING' :{
                $viewName = 'writing'; break;
            }
        }
        if($kategori != 'WRITING'){
            $params['id'] = $id;
            $params['ind']= 0;
            $params['quest'] = Practice::getQuest($type, $kategori, $id-1);
        }

        return view($viewName,$params);
    }

    public function pretestListening($type='TOEFL',$kategori= 'Reading'){
        return view('pre-test-listening',[
            'title' => 'Latihan ' .$kategori,
            'inkubasi' => 'selected',
            'type' => strtoupper($type),
            'kategori' => $kategori = strtoupper($kategori),
        ]);
    }

    public function materi($kategori,$materi,$target=1){
        $kategori = strtoupper($kategori);
        $kategori = str_replace('-',' ',$kategori);
        return view('materi',[
            'inkubasi' => 'selected',
            'title' => 'Materi',
            'type' => strtoupper($kategori),
            'materi' => strtoupper($materi),
            'data' => Materi::getMateri(strtoupper($kategori),$materi,$target),
            'ltitle' => Materi::getTitle($kategori,$materi),
            'target' => $target
        ]);
    }

    public function jawab(Request $request, $type, $kategori, $id){

        $jawaban = $request->input('jawaban');
        $result = Examination::jawab($type, $kategori, $id, $jawaban);
        if($result){
            $request->session()->put("jawaban.$type/$kategori/$id",$jawaban);
        }
        return $result;
    }

    public function submit(Request $request, $id){
        $mhs_id = Mahasiswa::getMahasiswa()->id;
        $report = Report::getReport($mhs_id,$id, true);

        if(!$report)
            redirect()->route('user');

        $total = (
            $report->score_listening +
            $report->score_writing +
            $report->score_reading
        );

        return view('report',[
            'title' => 'Report',
            'report' => $report,
            'total' => $total,
            'testDate' => HistoryExam::getHistoryExam($mhs_id,$report->history_exam_id)->created_at,
            'user' => auth()->user()
        ]);
    }

}
