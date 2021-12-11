<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class StatistikController extends Component
{
    public $nav;

    public $section;

    public $data;

    public function mount(){
        $this->nav = [
            [
                'title' => 'Statistik',
                'link' => url('/admin/statistik')
            ]
            ];
        $this->section = 1;
    }

    public function render()
    {
        return view('livewire.admin.statistik-controller')
            ->extends('layouts.admin',[
                'title' => 'Statistik',
                'nav' => $this->nav
            ])
            ->section('slot');
    }
}
