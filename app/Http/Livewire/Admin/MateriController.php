<?php

namespace App\Http\Livewire\Admin;

use App\Models\Materi;
use Livewire\Component;
use Livewire\WithPagination;

class MateriController extends Component
{
    use WithPagination;

    public $nav;
    public $filter = 'judul';
    public $keyword;
    public $ind = 1;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => 'Materi',
                'link' => url('/admin/inkubasi/materi')
            ]
            ];
    }

    public function render()
    {
        $materi = Materi::where('judul','like',"%$this->keyword%")
            ->orderBy($this->filter, 'asc')
            ->paginate('10');

        $this->ind = 1;

        return view('livewire.admin.materi-controller',[
            'materi' => $materi
        ])
            ->extends('layouts.admin',[
                'title' => 'Materi',
                'nav' => $this->nav
            ])
            ->section('slot');
    }
}
