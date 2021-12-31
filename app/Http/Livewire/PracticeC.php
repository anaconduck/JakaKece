<?php

namespace App\Http\Livewire;

use App\Models\HistoryJawabanPractice;
use App\Models\HistoryJawabanTest;
use App\Models\HistoryPractice;
use App\Models\Practice;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PracticeC extends Component
{
    public $idHistoryPractice;
    public $soal;
    public $daftarSoal;
    public $posisiSoal;
    public $daftarJawaban;
    public $isAnswered;
    public $idCourse;
    public $sesi = 0;
    public $sesiSoal;
    public $allsesi;
    public $waktu = 0;
    public $waktuSesi = 0;
    public $nav;
    public $course;
    public $finish = -1;
    public $next = -1;
    public $ans = '';


    protected $listeners = [
        'checkSesi' => 'checkSesi'
    ];

    public function mount($course)
    {
        if (!strpos(url()->previous(), 'inkubasi') and (!strpos(url()->previous(), "latihan/$course"))) {
            return redirect('/inkubasi');
        }
        $course = strtolower($course);
        if (array_key_exists($course, config('app.indexCourse')))
            $this->idCourse = config('app.indexCourse')[$course];
        else abort(404);
        if (auth()->user()->status == 'mahasiswa') {
            if ($this->idCourse == 4) abort(404);
        }
        $this->course = $course;
        $this->allsesi = config('app.' . $course);
        $this->sesi = 0;
        $historyPractice = HistoryPractice::getLastPractice($this->idCourse);
        $historyJawaban = false;

        $sesiName = $this->allsesi[$this->sesi]['sesi'];
        foreach (config('app.allSesi') as $ind => $s) {
            if ($s == $sesiName) {
                $this->sesiSoal = $ind;
                break;
            }
        }
        if ($historyPractice == null or $historyPractice->status_selesai) {
            $new = HistoryPractice::makeHistoryPractice(auth()->user()->identity, $course, $this->sesiSoal);
            $historyPractice = $new[0];
            $historyJawaban = $new[1];
            $this->sesi = 0;
            $this->waktuSesi = 0;
        } else {
            $waktu = (strtotime(now()) - strtotime($historyPractice->created_at)) / (60);
            if ($waktu >= config('app.totalTimeTest')[$course]) {
                $historyPractice->status_selesai = true;
                $historyPractice->save(['status_selesai']);
                $new = HistoryPractice::makeHistoryPractice(auth()->user()->identity, $course, $this->sesiSoal);
                $historyPractice = $new[0];
                $historyJawaban = $new[1];
                $this->sesi = 0;
            } else {
                $sesitime = $this->allsesi[0]['time'];
                for ($i = 0; $i < sizeof($this->allsesi); $i++) {
                    if ($waktu < $sesitime) {
                        $this->sesi = $i;
                        break;
                    } else if ($i < sizeof($this->allsesi) - 1) {
                        $sesitime += $this->allsesi[$i + 1]['time'];
                    }
                }
                $sesiName = $this->allsesi[$this->sesi]['sesi'];
                foreach (config('app.allSesi') as $ind => $s) {
                    if ($s == $sesiName) {
                        $this->sesiSoal = $ind;
                        break;
                    }
                }
                $historyJawaban = HistoryJawabanPractice::getHistoryJawaban($historyPractice->id, $this->sesi);
                if (!$historyJawaban) {
                    $historyJawaban = HistoryJawabanPractice::makeHistoryJawaban($historyPractice->id, $this->sesi, min($this->allsesi[$this->sesi]['num'], Practice::countQuest($this->idCourse, $this->sesiSoal)));
                }
                if ($this->sesi == 0) {
                    $this->waktuSesi = $waktu * 60;
                } else {
                    $this->waktuSesi = $waktu;
                    for ($i = 0; $i < $this->sesi; $i++) {
                        $this->waktuSesi -= $this->allsesi[$i]['time'];
                    }
                    $this->waktuSesi = ($this->waktuSesi) * 60;
                }
                $this->waktu = $waktu * 60;
            }
        }
        if (!$historyJawaban) {
            abort(500);
        }

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
                'title' => 'Practice ' . $course,
                'link'  => url('/latihan' . '/' . $course)
            ],
            [
                'title' => '' . $this->allsesi[$this->sesi]['sesi'],
                'link' => '#'
            ]
        ];
        
        $soal = Practice::show($this->idCourse, $this->sesiSoal, $this->daftarSoal[$this->posisiSoal]);
        if($soal) $soal = $soal->toArray();
        if (!($soal == null))
            $this->soal = $soal;
        else abort(500);
        if ($this->soal['tipe'] == 'f')
            $this->ans = $this->daftarJawaban[$this->posisiSoal];
    }

    public function jawab($jawab)
    {
        $up = 0;
        if (is_numeric($jawab)) {
            if ($jawab >= 0 and $jawab <= 3) {
                if (array_key_exists($this->posisiSoal, $this->daftarJawaban)) {
                    if ($this->daftarJawaban[$this->posisiSoal] == $this->soal['jawaban'] and $this->soal['jawaban'] != $jawab) {
                        $up = -1;
                    } else if ($this->daftarJawaban[$this->posisiSoal] != $this->soal['jawaban'] and $this->soal['jawaban'] == $jawab)
                        $up = 1;
                } else if ($this->soal['jawaban'] == $jawab) {
                    $up = 1;
                }
                $this->daftarJawaban[$this->posisiSoal] = $jawab;
                HistoryJawabanPractice::jawab($this->idHistoryPractice, $this->sesi, json_encode($this->daftarJawaban), $up);
            }
        }
    }

    public function updatingAns($value)
    {
        $up = 0;
        if ($this->soal['tipe'] == 'f') {
            if (array_key_exists($this->posisiSoal, $this->daftarJawaban)) {
                if ($this->daftarJawaban[$this->posisiSoal] == $this->soal['opsi1'] and $this->soal['opsi1'] != $value) {
                    $up = -1;
                } else if ($this->daftarJawaban[$this->posisiSoal] != $this->soal['opsi1'] and $this->soal['opsi1'] == $value) {
                    $up = 1;
                }
            } else if ($this->soal['opsi1'] == $value) {
                $up = 1;
            }
            $this->daftarJawaban[$this->posisiSoal] = $value;
            HistoryJawabanPractice::jawab($this->idHistoryPractice, $this->sesi, json_encode($this->daftarJawaban), $up);
        }
    }

    public function show($soal)
    {
        if ($soal >= 0 and $soal < $this->allsesi[$this->sesi]['num']) {
            $this->posisiSoal = $soal;
            $soal = Practice::show($this->idCourse, $this->sesiSoal, $this->daftarSoal[$this->posisiSoal])->toArray();
            if (!($soal == null))
                $this->soal = $soal;
            else abort(500);
            if ($this->soal['tipe'] == 'f')
                $this->ans = $this->daftarJawaban[$this->posisiSoal] ?? '';
        }
    }

    public function checkSesi()
    {
        $historyPractice = HistoryPractice::getLastPractice($this->idCourse);
        $waktu = (strtotime(now()) - strtotime($historyPractice->created_at)) / (60);
        if ($waktu >= config('app.totalTimeTest')[$this->course]) {
            $this->finish = 1;
            Session::forget('hasListenPractice');
        } else {
            $this->next = 1;
        }
    }

    public function render()
    {
        $this->isAnswered = array_key_exists($this->posisiSoal, $this->daftarJawaban);
        return view('livewire.practice-c')
            ->extends('layouts.app', [
                'nav' => $this->nav,
                'inkubasi' => 'selected',
                'title' => 'Practice Inkubasi Bahasa'
            ])
            ->section('slot');
    }
}
