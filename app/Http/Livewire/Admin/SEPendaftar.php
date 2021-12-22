<?php

namespace App\Http\Livewire\Admin;

use App\Models\ExchangePendaftar;
use App\Models\ExchangeTujuan;
use Livewire\Component;
use Livewire\WithPagination;

class SEPendaftar extends Component
{
    use WithPagination;

    public $nav;
    public $filter ='created_at';
    public $keyword;
    public $ind;

    //statistik
    public $idTujuan;
    public $labels;
    public $daftarTujuan;

    public $labels2;
    public $periode;
    public $listPr;

    protected $listeners = [
        'changeTujuan'
    ];

    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => 'SE Pendaftar',
                'link' => url('/admin/se/pendaftar')
            ]
        ];
        $this->daftarTujuan = ExchangeTujuan::getSimpleTujuan();
        $this->listPr = [];

        $this->idTujuan = 0;
        $this->periode = 2;
        $pr = 0;
        $tahun = config('app.periode.start');
        $mulai = strtotime(now());

        while (true) {
            $tgl = null;
            if ($pr % 2 == 0) {
                $tgl = config('app.periode.batas_tengah') . ' ' . $tahun;
            } else {
                $tahun += 1;
                $tgl = config('app.periode.batas_awal') . ' ' . $tahun;
            }
            $time = $mulai - strtotime($tgl);
            if ($time < 0) break;
            $pr += 1;
            array_push($this->listPr, $pr);
        }
    }

    public function changeTujuan($id){
        $this->idTujuan = $id;
    }

    public function show($id){
        return redirect('/admin/se/pendaftar/'.$id);
    }

    public function render()
    {
        $this->labels = array();
        $this->labels2 = array();
        $this->ind = 1;
        $data = ExchangePendaftar::select('exchange_pendaftars.*', 'exchange_tujuans.nama_universitas', 'users.name')
            ->join('exchange_tujuans', 'exchange_pendaftars.id_exchange_tujuan', '=', 'exchange_tujuans.id')
            ->join('users', 'users.identity', '=', 'exchange_pendaftars.identity')
            ->where('users.name', 'like', "%$this->keyword%")
            ->orWhere('exchange_tujuans.nama_universitas', 'like', "%$this->keyword%")
            ->orWhere('exchange_pendaftars.identity', 'like',"%$this->keyword%")
            ->orderBy($this->filter, 'desc')
            ->paginate(10);

        $pointer = ExchangePendaftar::pointer($this->idTujuan);

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

        $this->labels2 = ExchangeTujuan::pointer($this->periode);
        return view('livewire.admin.s-e-pendaftar',[
            'pendaftar' => $data,
        ])
            ->extends('layouts.admin',[
                'nav' => $this->nav,
                'title' => 'SE Pendaftar'
            ])
            ->slot('slot');
    }
}
