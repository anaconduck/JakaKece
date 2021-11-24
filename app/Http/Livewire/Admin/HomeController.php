<?php

namespace App\Http\Livewire\Admin;

use App\Models\ExchangeTujuan;
use App\Models\HistoryPractice;
use App\Models\JawaraEvent;
use App\Models\Mahasiswa;
use App\Models\Materi;
use App\Models\OjtTujuan;
use Livewire\Component;

class HomeController extends Component
{

    public $totalMahasiswa;
    public $totalMateri;
    public $totalEventJawara;
    public $totalSE;
    public $totalTraining;
    public $totalTaker;

    public $nav;

    public function mount(){
        $this->totalMahasiswa = Mahasiswa::count();
        $this->totalMateri = Materi::count();
        $this->totalEventJawara = JawaraEvent::count();
        $this->totalSE = ExchangeTujuan::count();
        $this->totalTraining = OjtTujuan::count();
        $this->totalTaker = HistoryPractice::countTaker();

        $this->nav = [
            [
                'title' => 'HomePage',
                'link' => url('/admin')
            ]
            ];
    }
    public function render()
    {
        return view('livewire.admin.home-controller')
            ->extends('layouts.admin',[
                'title' => 'HomePage',
                'nav' => $this->nav
            ])->section('slot');
    }
}
