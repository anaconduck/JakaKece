<?php

namespace App\Http\Livewire\Admin;

use App\Models\ExchangePendaftar;
use App\Models\HistoryJawabanPractice;
use App\Models\HistoryPractice;
use App\Models\HistoryTest;
use App\Models\JawaraPendaftar;
use App\Models\Materi;
use App\Models\OjtPendaftar;
use App\Models\Practice;
use App\Models\Test;
use Livewire\Component;

class Dashboard extends Component
{

    public $jumlahPengunjung;

    public $jumlahSE;
    public $jumlahMagang;
    public $jumlahJawara;
    public $jumlahPractice;
    public $jumlahTest;

    public $jumlahMateri;
    public $jumlahSoal;
    public $jumlahSoalTest;

    public $meanPractice;
    public $meanTest;

    public $meanPendanaan;

    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->jumlahPengunjung = visits('App\Models\Berita')->period('day')->count();
        $this->jumlahSE = ExchangePendaftar::countSE();
        $this->jumlahMagang = OjtPendaftar::countOJT();
        $this->jumlahJawara = JawaraPendaftar::countJawara();
        $this->jumlahPractice = HistoryPractice::countHP();
        $this->jumlahTest = HistoryTest::countHT();
        $this->jumlahMateri = Materi::count();
        $this->jumlahSoal = Practice::count();
        $this->jumlahSoalTest = Test::count();
        $this->meanTest = HistoryTest::mean();
        $this->meanPendanaan = JawaraPendaftar::meanPendanaan();
    }

    public function render()
    {
        $nav = [
            [
                'title' => 'Dashboard',
                'link' => url('/admin/dashboard')
            ]
            ];

        return view('livewire.admin.dashboard')
            ->extends('layouts.admin', [
                'nav' => $nav
            ])
            ->slot('slot');
    }
}
