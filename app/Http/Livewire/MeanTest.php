<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MeanTest extends Component
{
    public $labels;
    public $idCourse;
    public $listeners = [
        'changeCourse'
    ];

    public function mount(){
        $this->idCourse = 1;
    }

    public function changeCourse($id){
        if(array_key_exists($id, config('app.allCourse'))){
            $this->idCourse = $id;
        }
    }

    public function render()
    {
        $this->labels = array();
        $nav = [
            [
                'title' => 'Statistik',
                'link' => url('/admin/dashboard')
            ],
            [
                'title' => 'Statistik Rerata Test',
                'link' => url('/admin/mean-test')
            ]
            ];
        

        return view('livewire.mean-test')
            ->extends('layouts.admin',[
                'title' => 'Statistik Mean Test',
                'nav' => $nav
            ])
            ->slot('slot');
    }
}
