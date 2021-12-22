<?php

namespace App\Http\Livewire;

use App\Models\HistoryTest;
use Livewire\Component;

class StatistikTest extends Component
{
    public $labels;
    public $idCourse;

    public $listeners = [
        'changeCourse' => 'changeCourse'
    ];

    public function mount()
    {
        $this->idCourse = 1;
    }

    public function changeCourse($id)
    {
        if (array_key_exists($id, config('app.allCourse'))) {
            $this->idCourse = $id;
            $this->labels = array();

            $pointer = HistoryTest::pointer($this->idCourse);
            foreach ($pointer as $p) {
                $label = date('m', strtotime($p->created_at));
                if (!isset($this->labels[$label])) {
                    $this->labels[$label] = 1;
                } else $this->labels[$label] += 1;
            }
            return $this->labels;
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
                'title' => 'Statistik Test Inkubasi Bahasa',
                'link' => url('/admin/jumlah-test')
            ]
        ];

        $pointer = HistoryTest::pointer($this->idCourse);
        foreach ($pointer as $p) {
            $label = date('m', strtotime($p->created_at));
            if (!isset($this->labels[$label])) {
                $this->labels[$label] = 1;
            } else $this->labels[$label] += 1;
        }
        return view('livewire.statistik-test')
            ->extends('layouts.admin', [
                'title' => 'Statistik',
                'nav' => $nav
            ])
            ->slot('slot');
    }
}
