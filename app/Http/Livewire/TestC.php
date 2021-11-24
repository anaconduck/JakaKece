<?php

namespace App\Http\Livewire;

use App\Models\HistoryJawabanTest;
use App\Models\HistoryTest;
use App\Models\Test;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class TestC extends Component
{
    public $idHistoryTest;
    public Test $soal;
    public $daftarSoal;
    public $posisiSoal;
    public $daftarJawaban;
    public $isAnswered;
    public $idCourse;
    public $sesi = 0;
    public $allsesi;
    public $waktu = 0;
    public $waktuSesi = 0;
    public $nav;
    public $course;
    public $finish = -1;
    public $next = -1;
    public $ans='';

    protected $listeners = [
        'checkSesi' => 'checkSesi'
    ];

    public function mount($course){
        if(strpos(url()->previous(),'inkubasi')){
            return redirect('/inkubasi');
        }

        $course = strtolower($course);
        if(array_key_exists($course, config('app.indexCourse')))
            $this->idCourse = config('app.indexCourse')[$course];
        else abort(404);

        $this->course = $course;
        $this->allsesi = config('app.'.$course);
        $this->sesi = 0;
        $historyTest = HistoryTest::getLastTest($this->idCourse);
        $historyJawaban = false;

        if($historyTest == null or $historyTest->status_selesai){
            $new = HistoryTest::makeHistoryTest(auth()->user()->identity, $course);
            $historyTest = $new[0];
            $historyJawaban = $new[1];
            $this->sesi = 0;
            $this->waktuSesi = 0;
        }else{
            $waktu = (strtotime(now())-strtotime($historyTest->created_at))/60;
            if($waktu >= config('app.totalTimeTest')[$course]){
                $historyTest->status_selesai = true;
                $historyTest->save(['status_selesai']);
                $new = HistoryTest::makeHistoryTest(auth()->user()->identity, $course);
                $historyTest = $new[0];
                $historyJawaban = $new[1];
                $this->sesi = 0;
            }else{
                $sesitime = $this->allsesi[0]['time'];
                for($i = 0; $i< sizeof($this->allsesi);$i++){
                    if($waktu< $sesitime){
                        $this->sesi = $i;
                        break;
                    }else if($i < sizeof($this->allsesi)-1){
                        $sesitime += $this->allsesi[$i+1]['time'];
                    }
                }
                $historyJawaban = HistoryJawabanTest::getHistoryJawaban($historyTest->id, $this->sesi);
                if(!$historyJawaban){
                    $historyJawaban = HistoryJawabanTest::makeHistoryJawaban($historyTest->id,$this->sesi,$this->allsesi[$this->sesi]['num']);
                }
                if($this->sesi == 0){
                    $this->waktuSesi = $waktu * 60;
                }else{
                    $this->waktuSesi = $waktu;
                    for($i = 0; $i<$this->sesi;$i++){
                        $this->waktuSesi -= $this->allsesi[$i]['time'];
                    }
                    $this->waktuSesi = $this->waktuSesi * 60;
                }
                $this->waktu = $waktu*60;
            }
        }
        if(!$historyTest){
            abort(500);
        }

        $this->idHistoryTest = $historyTest->id;
        $this->daftarSoal = json_decode($historyJawaban->daftar_soal);
        $this->posisiSoal = 0;
        $this->daftarJawaban = json_decode($historyJawaban->daftar_jawaban);
        $this->nav = [
            [
                'title' => 'Inkubasi Digital Bahasa',
                'link' => url('/inkubasi')
            ],
            [
                'title' => 'Test '.$course,
                'link' => url('/latihan'.'/'.$course)
            ],
            [
                'title' => $this->allsesi[$this->sesi]['sesi'],
                'link' => '#'
            ]
        ];
        $soal = Test::show($this->idCourse, $this->sesi, $this->daftarSoal[$this->posisiSoal]);
        if(!($soal == null))
            $this->soal = $soal;
        else abort(500);

        if($this->soal->tipe == 'f')
            $this->ans = $this->daftarJawaban[$this->posisiSoal];
        if(strpos($this->allsesi[$this->sesi]['sesi'], 'listening')!== false and !Session::has('hasListenTest')){
            Session::put('hasListenTest', collect(array_fill(0, $this->allsesi[$this->sesi]['num'],0)));
        }
    }

    public function jawab($jawab){
        $up = 0;
        if(is_numeric($jawab)){
            if($jawab >= 0 and $jawab<=3){
                if(array_key_exists($this->posisiSoal, $this->daftarJawaban)){
                    if($this->daftarJawaban[$this->posisiSoal] == $this->soal->jawaban and $this->soal->jawaban != $jawab){
                        $up = -1;
                    }
                    else if($this->daftarJawaban[$this->posisiSoal] != $this->soal->jawaban and $this->soal->jawaban == $jawab){
                        $up = 1;
                    }
                }else if($this->soal->jawaban == $jawab){
                    $up = 1;
                }
                $this->daftarJawaban[$this->daftarSoal] = $jawab;
                HistoryJawabanTest::jawab($this->idHistoryTest, $this->sesi, json_encode($this->daftarJawaban),$up);
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
            $this->daftarJawaban[$this->posisiSoal] = $value;
            HistoryJawabanTest::jawab($this->idHistoryTest, $this->sesi, json_encode($this->daftarJawaban),$up);
        }
    }

    public function show($soal){
        if($soal >= 0 and $soal < $this->allsesi[$this->sesi]['num']){
            $this->posisiSoal = $soal;
            $soal = Test::show($this->idCourse, $this->sesi, $this->daftarSoal[$this->posisiSoal]);
            if(!($soal == null))
                $this->soal = $soal;
            else abort(500);
            if($this->soal->tipe == 'f')
                $this->ans = $this->daftarJawaban[$this->posisiSoal];
        }
    }

    public function checkSesi(){
        $historyTest = HistoryTest::getLastTest($this->idCourse);
        $waktu = (strtotime(now())-strtotime($historyTest->created_at))/60;
        if($waktu >= config('app.totalTimeTest')[$this->course]){
            $this->finish = 1;
            Session::forget('hasListenTest');
        }else{
            $this->next = 1;
        }
    }

    public function hasListenTest($soal){
        Session::put("hasListenTest.$soal",1);
    }

    public function render()
    {
        $this->isAnswered = array_key_exists($this->posisiSoal, $this->daftarJawaban);
        return view('livewire.test-c')
            ->extends('layouts.app',[
                'title' => "Test $this->course",
                'inkubasi' => 'selected',
                'nav' => $this->nav
            ])
            ->section('slot');
    }
}
