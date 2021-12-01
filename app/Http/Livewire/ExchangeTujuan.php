<?php

namespace App\Http\Livewire;

use App\Models\ExchangeTujuan as ET;
use Livewire\Component;
use Livewire\WithPagination;

class ExchangeTujuan extends Component
{
    use WithPagination;

    public $nav;
    public $filter = "nama_universitas";
    public $keyword;
    public $ind;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => "Tujuan Student Exchange",
                'link' => url('/admin/se/tujuan')
            ]
            ];
    }

    public function show($id){
        return redirect('admin/se/tujuan/'.$id);
    }

    public function render()
    {
        $data = ET::where('nama_universitas', 'like',"%$this->keyword%")
            ->orderBy($this->filter, 'asc')
            ->paginate(10);
        $this->ind = 1;
        return view('livewire.exchange-tujuan',[
            'tujuan' => $data
        ])
            ->extends('layouts.admin',[
                'title' => 'Tujuan Student Exchange',
                'nav' => $this->nav
            ])
            ->slot('slot');
    }
}
