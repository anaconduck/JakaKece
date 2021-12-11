<?php

namespace App\Http\Livewire\Admin;

use App\Models\OjtPaket;
use Livewire\Component;

class OjtMagang extends Component
{
    public $nav;
    public $filter;
    public $keyword;
    public $ind;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => 'Daftar Magang Tersedia',
                'link' => url('/admin/ojt/magang')
            ]
        ];
    }

    public function show($id){
        return redirect(url('/admin/ojt/magang/'.$id));
    }

    public function render()
    {
        $this->ind = 1;
        $data = OjtPaket::select('ojt_events.nama_event','ojt_tujuans.nama_instansi', 'ojt_pakets.*', 'ojt_events.id_prodi')
            ->join('ojt_events','ojt_pakets.id_ojt_event', '=', 'ojt_events.id')
            ->join('ojt_tujuans', 'ojt_tujuans.id','=','ojt_pakets.id_ojt_tujuan')
            ->where('ojt_events.nama_event', 'like', "%$this->keyword%")
            ->orWhere('ojt_tujuans.nama_instansi', 'like', "%$this->keyword%")
            ->orderBy('akhir_daftar', 'desc')
            ->paginate(10);
        return view('livewire.admin.ojt-magang',[
            'magang' => $data
        ])
            ->extends('layouts.admin',[
                'nav' => $this->nav,
                'title' => 'Daftar Magang'
            ])
            ->slot('slot');
    }
}
