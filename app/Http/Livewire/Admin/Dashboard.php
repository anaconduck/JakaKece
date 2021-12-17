<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Dashboard extends Component
{

    public $jumlahPengunjuang;

    public $jumlahSE;
    public $jumlahMagang;
    public $jumlahJawara;
    public $jumlahPractice;
    public $jumlahTest;

    public $jumlahMateri;
    public $jumlahSoal;

    public $meanPractice;
    public $meanTest;

    public $meanDana;

    protected $paginationTheme = 'bootstrap';

    public function mount(){
        
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
