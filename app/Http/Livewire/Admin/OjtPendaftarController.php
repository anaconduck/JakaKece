<?php

namespace App\Http\Livewire\Admin;

use App\Models\OjtPendaftar;
use Livewire\Component;

class OjtPendaftarController extends Component
{
    public $filter ='created_at';
    public $keyword;
    public $ind;
    protected $paginationTheme = 'bootstrap';

    //istatistik
    public $labels;

    public function mount(){
        $this->labels = array();
    }

    public function show($id){
        return redirect('/admin/ojt/pendaftar/'.$id);
    }

    public function render()
    {
        $this->ind = 1;
        $nav = [
            [
                'title' => 'Pendaftar Magang',
                'link' => url('/admin/ojt/pendaftar')
            ]
        ];
        $data = OjtPendaftar::select('ojt_pendaftars.*', 'users.name', 'ojt_events.nama_event','ojt_tujuans.nama_instansi')
            ->join('users', 'users.identity', '=', 'ojt_pendaftars.identity')
            ->join('ojt_pakets', 'ojt_pakets.id', '=', 'ojt_pendaftars.id_paket')
            ->join('ojt_events', 'ojt_events.id', '=', 'ojt_pakets.id_ojt_event')
            ->join('ojt_tujuans', 'ojt_tujuans.id', '=', 'ojt_pakets.id_ojt_tujuan')
            ->where('users.name', 'like', "%$this->keyword%")
            ->orWhere('ojt_events.nama_event', 'like', "%$this->keyword%")
            ->orWhere('ojt_tujuans.nama_instansi', 'like', "%$this->keyword%")
            ->orderBy($this->filter, 'desc')
            ->paginate(10);

        $pointer = OjtPendaftar::pointer();
        foreach($pointer as $p){
            $label = null;
            $thn = config('app.periode.start') + ceil($p->periode/2);
            if($p->periode %2 == 0){
                $label = 'Genap '.($thn-1).'/'.($thn);
            }else{
                $label = 'Ganjil '.($thn-1).'/'.($thn);
            }
            if(!isset($this->labels[$label])){
                $this->labels[$label] = 1;
            }else $this->labels[$label] +=1;
        }
        return view('livewire.admin.ojt-pendaftar-controller',[
            'pendaftar' => $data
        ])
            ->extends('layouts.admin', [
                'nav' => $nav,
                'title' => 'Pendaftar Magang'
            ])
            ->slot('slot');
    }
}
