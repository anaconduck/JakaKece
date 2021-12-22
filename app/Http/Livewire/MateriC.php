<?php

namespace App\Http\Livewire;

use App\Models\Materi;
use Livewire\Component;

class MateriC extends Component
{
    public $currentMateri;
    public $idCourse;
    public $sesi;
    public $indMateri;
    public $allJudul;
    public $i = 1;
    public $nav;

    public function mount($course, $sesi, $target){
        $course = strtolower($course);
        $sesi = strtolower($sesi);

        $this->idCourse = config('app.indexCourse')[$course] ?? 1;
        $this->sesi = array_search($sesi,config('app.allSesi')) + 1 ?? 1;

        $this->currentMateri = Materi::firstMateri($this->idCourse, $this->sesi);
        if(!$this->currentMateri){
            return;
        }else{
            $this->currentMateri = $this->currentMateri->toArray();
        }

        $this->indMateri = $this->currentMateri['id'];
        $this->allJudul = Materi::allJudulWith($this->idCourse, $this->sesi);

    }

    public function updateInd($ind){
        if($ind <= sizeof($this->allJudul)){
            $this->indMateri = $ind;
            $this->currentMateri = Materi::getMateri($this->idCourse, $this->sesi, $this->indMateri)->toArray();
        }
    }

    public function render()
    {

        $this->nav = [
            [
                'title' => 'Inkubasi Bahasa Digital',
                'link' => url('/inkubasi')
            ],
            [
                'title' => 'Materi ' . config('app.allCourse.'.$this->idCourse),
                'link' => url('/materi/toefl-itp/0')
            ]
        ];
        return view('livewire.materi-c')
            ->extends('layouts.app',[
                'title' => "Materi ".config('app.allCourse.'.$this->idCourse),
                'nav' => $this->nav,
                'inkubasi' => 'selected'
            ])
            ->section('slot');
    }
}
