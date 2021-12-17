<?php

namespace App\Http\Livewire\Admin;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithPagination;

class BeritaC extends Component
{
    use WithPagination;

    public $filter = 'judul';
    public $keyword;
    public $ind;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
    }

    public function show($id){
        return redirect(url('/admin/berita/'.$id));
    }

    public function render()
    {
        $nav = [
            [
                'title' => 'Berita',
                'link' => url('/admin/berita')
            ]
        ];
        $data = Berita::where('judul', 'like', "%$this->keyword%")
            ->orWhere('deskripsi', 'like', "%$this->keyword%")
            ->orderBy($this->filter, 'asc')
            ->paginate(10);
        return view('livewire.admin.berita-c',[
            'berita' => $data
        ])
            ->extends('layouts.admin', [
                'nav' => $nav
            ])
            ->slot('slot');
    }
}
