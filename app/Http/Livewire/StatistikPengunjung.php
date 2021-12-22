<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatistikPengunjung extends Component
{

    public $filter;
    public $labels;


    public function mount(){
        $this->filter = 'year';
    }
    public function render()
    {
        $nav = [
            [
                'title' => 'Statistik',
                'link' => url('/admin/statistik')
            ],
            [
                'title' => 'Statistik Pengunjung',
                'link' => url('/admin/pengunjung')
            ]
            ];

        return view('livewire.statistik-pengunjung',[
            'tahun' => visits('App\Models\Berita')->period('year')->count(),
            'bulan' => visits('App\Models\Berita')->period('month')->count(),
            'week' => visits('App\Models\Berita')->period('week')->count(),
            'day' => visits('App\Models\Berita')->period('day')->count(),
            'hour' => visits('App\Models\Berita')->period('hour')->count()
        ])
            ->extends('layouts.admin', [
                'title' => 'Statistik Pengunjung',
                'nav' => $nav
            ])
            ->slot('slot');
    }
}
