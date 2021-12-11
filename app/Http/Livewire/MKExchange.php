<?php

namespace App\Http\Livewire;

use App\Models\ExchangeMataKuliah;
use Livewire\Component;
use Livewire\WithPagination;

class MKExchange extends Component
{
    use WithPagination;

    public $nav;
    public $filter = "nama_mata_kuliah";
    public $keyword;
    public $ind;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => "MK Student Exchange",
                'link' => url('/admin/se/mk')
            ]
            ];
    }

    public function show($id){
        return redirect('/admin/se/mk/'.$id);
    }

    public function render()
    {
        $data = ExchangeMataKuliah::where('nama_mata_kuliah', 'like', "%$this->keyword%")
            ->orwhere('sks', '=',"$this->keyword")
            ->orderBy('nama_mata_kuliah', 'asc')
            ->paginate(10);

        $this->ind = 1;

        return view('livewire.m-k-exchange',[
            'mk' => $data
        ])
            ->extends('layouts.admin',[
                'title' => 'MK Student Exchange',
                'nav' => $this->nav
            ])
            ->slot('slot');
    }
}
