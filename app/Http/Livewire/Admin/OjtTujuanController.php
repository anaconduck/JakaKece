<?php

namespace App\Http\Livewire\Admin;

use App\Models\OjtTujuan;
use Livewire\Component;
use Livewire\WithPagination;

class OjtTujuanController extends Component
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
                'title' => 'Instansi Magang',
                'link' => url('/admin/ojt/tujuan')
            ]
        ];
    }

    public function show($id){
        return redirect('/admin/ojt/tujuan/'.$id);
    }

    public function render()
    {
        $this->ind = 1;
        $data = OjtTujuan::where('nama_instansi', 'like', "%$this->keyword%")
            ->paginate(10);
        return view('livewire.admin.ojt-tujuan-controller',[
            'tujuan' => $data
        ])
            ->extends('layouts.admin', [
                'nav' => $this->nav,
                'title' => 'Instansi Magang',
            ])
            ->slot('slot');
    }
}
