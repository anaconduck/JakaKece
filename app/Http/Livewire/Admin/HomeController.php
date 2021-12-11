<?php

namespace App\Http\Livewire\Admin;

use App\Models\Dosen;
use App\Models\ExchangeMataKuliah;
use App\Models\ExchangePendaftar;
use App\Models\ExchangeTujuan;
use App\Models\HistoryPractice;
use App\Models\JawaraEvent;
use App\Models\JawaraPendaftar;
use App\Models\Mahasiswa;
use App\Models\Materi;
use App\Models\OjtPendaftar;
use App\Models\OjtTujuan;
use Livewire\Component;

class HomeController extends Component
{
    //statistik umum
    public $totalMahasiswa;
    public $totalDosen;

    //inkubasi bahasa
    public $totalMateriITP = 0;
    public $totalMateriIBT = 0;
    public $totalMateriTOEIC = 0;
    public $totalMateriIELTS = 0;

    //jawaracenter
    public $totalLomba;
    public $totalPendaftar;

    //studentexchange
    public $totalTujuanSE;
    public $totalPendaftarSE;
    public $totalMatkulSE;

    //magang
    public $totalTujuanOJT;
    public $totalPendaftarOJT;

    public $nav;

    public function mount(){
        $this->totalMahasiswa = Mahasiswa::count();
        $this->totalDosen = Dosen::count();

        $materi = Materi::lazy();
        foreach($materi as $m){
            switch($m->id_course){
                case 1:{
                    $this->totalMateriITP ++;
                    break;
                }
                case 2 : {
                    $this->totalMateriIBT ++;
                    break;
                }
                case 3 : {
                    $this->totalMateriTOEIC ++;
                    break;
                }
                case 4 : {
                    $this->totalMateriIELTS ++;
                }
            }
        }

        $this->totalLomba = JawaraEvent::count();
        $this->totalPendaftar = JawaraPendaftar::count();

        $this->totalTujuanSE = ExchangeTujuan::count();
        $this->totalPendaftarSE = ExchangePendaftar::count();
        $this->totalMatkulSE = ExchangeMataKuliah::count();

        $this->totalTujuanOJT = OjtTujuan::count();
        $this->totalPendaftarOJT = OjtPendaftar::count();

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
