<?php

namespace App\Http\Livewire;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithPagination;

class BeritaController extends Component
{
    use WithPagination;

    public Berita $currentBerita;
    public $indBerita;
    public $i=1;
    protected $paginationTheme = 'bootstrap';


    public function mount(Berita $berita){
        if(!$berita) abort(404);

        $this->currentBerita = $berita;
        $this->indBerita = $berita->id;
    }

    public function show($id){
        $this->currentBerita = Berita::find($id);
        if(!$this->currentBerita) abort(404);

        $this->indBerita = $this->currentBerita->id;
    }

    public function render()
    {
        $listBerita = Berita::where('display', true)
            ->where('id', '<>', $this->indBerita)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $nav = [
            [
                'title' => 'Home',
                'link' => url('/')
            ],
            [
                'title' => $this->currentBerita->judul,
                'link' => url('/berita/'.$this->currentBerita->id)
            ]
            ];
        return view('livewire.berita-controller',[
            'berita' => $listBerita
        ])
            ->extends('layouts.app',[
                'title' => $this->currentBerita->judul,
                'nav' => $nav,
            ])
            ->section('slot');
    }
}
