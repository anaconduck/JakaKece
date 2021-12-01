<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\JawaraPendaftar as JP;

class JawaraPendaftar extends Component
{
    use WithPagination;

    public $nav;
    public $filter = "users.name";
    public $keyword;
    public $ind;
    protected $paginationTheme = "bootstrap";

    public function mount(){
        $this->nav = [
            [
                'title' => 'Jawara Pendaftar',
                'link' => url('/admin/jawara/pendaftar')
            ]
        ];
    }

    public function show($id){
        return redirect('/admin/jawara/pendaftar/'.$id);
    }

    public function render()
    {
        $this->ind = 1;
        $data = JP::select('jawara_pendaftars.*','users.name as nama_dosen','jawara_events.nama')
            ->join('jawara_events','jawara_events.id','=','jawara_pendaftars.id_jawara_event')
            ->leftJoin('users','jawara_pendaftars.id_dosen','=','users.identity')
            ->where('jawara_events.nama','like', "%$this->keyword%")
            ->orWhere('jawara_pendaftars.id_mahasiswa','like',"%$this->keyword%")
            ->orWhere('users.name','like', "%$this->keyword%")
            ->paginate(10);
        return view('livewire.jawara-pendaftar',[
            'pendaftar' => $data
        ])
            ->extends('layouts.admin',[
                'nav' => $this->nav,
                'title' => 'Jawara Pendaftar'
            ])
            ->slot('slot');
    }
}
