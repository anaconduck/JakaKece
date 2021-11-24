<?php

namespace App\Http\Livewire;

use App\Models\ExchangeTujuan;
use App\Models\JawaraEvent;
use Livewire\Component;
use Livewire\WithPagination;

class ExchangeC extends Component
{
    use WithPagination;

    public $searchDn;
    public $searchLn;
    public $searchRiwayat;
    public $pos=0;
    public $dn;
    public $ln;
    public $riwayat;

    protected $paginationTheme = 'bootstrap';

    public function mount(){

    }

    public function updatingSearchDn(){
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingSearchLn(){
        $this->resetPage();
        $this->pos = 1;
    }
    public function updatingSearchRiwayat(){
        $this->resetPage();
        $this->pos = 2;
    }

    public function updatingDn(){
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingLn(){
        $$this->resetPage();
        $this->pos = 1;
    }
    public function updatingRiwayat(){
        $this->resetPage();
        $this->pos = 2;
    }

    public function render()
    {
        $this->dn = ExchangeTujuan::where('dalam_negeri',true)
            ->where('nama_universitas','like','%'.$this->searchDn.'%')
            ->orderBy('nama_universitas','asc')
            ->paginate(10,['*'],'dn');
        $this->ln = ExchangeTujuan::where('dalam_negeri',false)
            ->where('nama_universitas','like','%'.$this->searchLn.'%')
            ->orderBy('nama_universitas','asc')
            ->paginate(10,['*'],'ln');
        $this->riwayat = ExchangeTujuan::orderBy('nama_universitas','asc')
            ->paginate(10,['*'],'riwayat');
        return view('livewire.exchange-c',[
        ]);
    }
}
