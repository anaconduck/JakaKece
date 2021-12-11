<?php

namespace App\Http\Livewire;

use App\Models\HistoryJawabanPractice;
use App\Models\HistoryPractice;
use App\Models\Practice;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class PracticeCSec extends Component
{

    public $idHistoryPractice;
    public Practice $soal;
    public $daftarSoal;
    public $daftarJawaban;
    public $isAnswered;
    public $idCourse;
    public $sesi=0;
    public $allsesi;
    public $waktu=0;
    public $waktuSesi = 0;
    public $nav;
    public $course;
    public $finish= -1;
    public $next = -1;
    public $ans='';
    public $pendek;
    public $posisiSoal;


    public function mount($course, $sesi, $tipe){
        if(!strpos(url()->previous(),'inkubasi') and !(strpos(url()->previous(), "latihan/$course"))){
            return redirect('/inkubasi');
        }
        $course = strtolower($course);
        if(array_key_exists($course,config('app.indexCourse')))
            $this->idCourse = config('app.indexCourse')[$course];
        else abort(404);
        if(auth()->user()->status == 'mahasiswa'){
            if($this->idCourse == 4) abort(404);
        }
        if($tipe == 'pendek') $this->pendek = true;
        else if($tipe == 'penuh') $this->pendek = false;
        else abort(404);

        $this->course = $course;
        $this->allsesi = config('app.'.$course);
        foreach($this->allsesi as $ind => $val){
            if($sesi == $val['sesi']){
                $this->sesi = $ind;
                break;
            }
        }
        if($this->sesi === null) abort(404);

        $historyPractice = HistoryPractice::getLastPractice($this->idCourse, false);
        $historyJawaban = false;

        if($historyPractice == null or $historyPractice->status_selesai){
            $new = HistoryPractice::makeHistoryPractice(auth()->user()->identity, $course, false, $this->pendek, $this->sesi);
            $historyPractice = $new[0];
            $historyJawaban = $new[1];
            $this->waktuSesi = 0;
        }else{
            $waktu = (strtotime(now()) - strtotime($historyPractice->created_at))/(60);
            $historyJawaban = HistoryJawabanPractice::getHistoryJawaban($historyPractice->id, null);

            if($waktu >= $this->allsesi[$historyJawaban->sesi]['time']){
                $historyPractice->status_selesai = true;
                $historyPractice->save(['status_selesai']);
                $new = HistoryPractice::makeHistoryPractice(auth()->user()->identity, $course, false, $this->pendek, $this->sesi);
                $historyPractice = $new[0];
                $historyJawaban = $new[1];
            }else{
                $this->sesi = $historyJawaban->sesi;
                $this->waktuSesi = $waktu * 60;
                $this->waktu = $waktu * 60;
            }
        }
        if(!$historyJawaban) abort(500);

        $this->idHistoryPractice = $historyPractice->id;
        $this->daftarSoal = json_decode($historyJawaban->daftar_soal);
        $this->posisiSoal = 0;
        $this->daftarJawaban = json_decode($historyJawaban->daftar_jawaban);
        $this->nav = [
            [
                'title' => 'Inkubasi Digital Bahasa',
                'link' => url('/inkubasi')
            ],
            [
                'title' => 'Practice '.$course,
                'link' => url('/latihan'.'/'.$course."/$sesi/$tipe")
            ],
            [
                'title' => ''.$this->allsesi[$this->sesi]['sesi'],
                'link' => '#'
            ]
            ];

        $soal = Practice::show($this->idCourse, $this->sesi, $this->daftarSoal[$this->posisiSoal]);

        if(!($soal == null)) $this->soal = $soal;
        else abort(500);

        if($this->soal->tipe == 'f') $this->ans = $this->daftarJawaban[$this->posisiSoal];

        if(strpos($this->allsesi[$this->sesi]['sesi'],'listening')!== false and !Session::has('hasListenPractice')){
            Session::put('hasListenPractice', collect(array_fill(0, sizeof($this->daftarSoal), 0)));
        }
    }

    public function jawab($jawab){
        $up = 0;
        if(is_numeric($jawab)){
            if($jawab >=0 and $jawab <=3){
                if(array_key_exists($this->posisiSoal, $this->daftarJawaban)){
                    if($this->daftarJawaban[$this->posisiSoal] == $this->soal->jawaban and $this->soal->jawaban != $jawab){
                        $up = -1;
                    }
                    else if($this->daftarJawaban[$this->posisiSoal] != $this->soal->jawaban and $this->soal->jawaban == $jawab)
                        $up = 1;
                }else if($this->soal->jawaban == $jawab){
                    $up = 1;
                }
                $this->daftarJawaban[$this->posisiSoal] = $jawab;
                HistoryJawabanPractice::jawab($this->idHistoryPractice, $this->sesi, json_encode($this->daftarJawaban), $up);
            }
        }
    }

    public function updatingAns($value){
        $up = 0;
        if($this->soal->tipe == 'f'){
            if(array_key_exists($this->posisiSoal, $this->daftarJawaban)){
                if($this->daftarJawaban[$this->posisiSoal] == $this->soal->opsi1 and $this->soal->opsi1 != $value){
                    $up = -1;
                }
                else if($this->daftarJawaban[$this->posisiSoal] != $this->soal->opsi1 and $this->soal->opsi1 == $value){
                    $up = 1;
                }
            }else if($this->soal->opsi1 == $value){
                $up = 1;
            }
            $this->daftarJawaban[$this->posisiSoal] =$value;
            HistoryJawabanPractice::jawab($this->idHistoryPractice, $this->sesi, json_encode($this->daftarJawaban),$up);
        }
    }

    public function show($soal){
        if($soal >= 0 and $soal < sizeof($this->daftarSoal)){
            $this->posisiSoal = $soal;
            $soal = Practice::show($this->idCourse, $this->sesi, $this->daftarSoal[$this->posisiSoal]);
            if(!($soal == null)) $this->soal = $soal;
            else abort(500);
            if($this->soal->tipe == 'f') $this->ans = $this->daftarJawaban[$this->posisiSoal] ?? '';
        }
    }

    public function render()
    {
        $this->isAnswered = array_key_exists($this->posisiSoal, $this->daftarJawaban);

        return view('livewire.practice-c-sec')
            ->extends('layouts.app',[
                'title' => 'Practice Inkubasi Bahasa',
                'nav' => $this->nav,
                'inkubasi' => 'selected'
            ])
            ->section('slot');
    }
}
