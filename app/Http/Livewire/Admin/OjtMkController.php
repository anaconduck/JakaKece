<?php

namespace App\Http\Livewire\Admin;

use App\Models\OjtMataKuliah;
use Livewire\Component;
use Livewire\WithPagination;

class OjtMkController extends Component
{
    use WithPagination;

    public $nav;
    public $filter;
    public $keyword;
    public $ind;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => 'Mk Magang',
                'link' => url('/admin/ojt/mk')
            ]
        ];
    }

    public function show($id){
        return redirect('/admin/ojt/mk/'.$id);
    }

    public function render()
    {
        $this->ind =1;
        $data = OjtMataKuliah::where('nama_mata_kuliah', 'like', "%$this->keyword%")
            ->orWhere('sks', '=', $this->keyword)
            ->paginate(10);
        return view('livewire.admin.ojt-mk-controller',[
            'mk' => $data
        ])
            ->extends('layouts.admin',[
                'nav' => $this->nav,
                'title' => 'Mk Magang'
            ])
            ->slot('slot');
    }
}
