<?php

namespace App\Http\Livewire;

use App\Models\OjtPaket;
use App\Models\OjtTujuan;
use Livewire\Component;
use Livewire\WithPagination;

class OjtC extends Component
{
    use WithPagination;

    public $searchPendaftaran;
    public $searchRiwayat;
    public $pos = 0;
    public $pendaftaran;
    public $terlaksana;
    public $riwayat;

    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->terlaksana = OjtPaket::select('ojt_pakets.id','ojt_events.nama_event','ojt_tujuans.nama_instansi')
            ->join('ojt_events','ojt_pakets.id_ojt_event','=','ojt_events.id')
            ->join('ojt_tujuans','ojt_pakets.id_ojt_tujuan','=','ojt_tujuans.id')
            ->where('ojt_pakets.mulai_training','<',now())
            ->where('ojt_pakets.akhir_training','>',now())
            ->orderBy('ojt_pakets.created_at','desc')
            ->paginate(10,['*'],'terlaksana');
    }

    public function updatingSearchPendaftaran(){
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingSearchTerlaksana(){
        $this->resetPage();
        $this->pos = 1;
    }

    public function updatingSearchRiwayat(){
        $this->resetPage();
        $this->pos = 2;
    }

    public function updatingPendaftaran(){
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingTerlaksana(){
        $this->resetPage();
        $this->pos = 1;
    }
    public function updatingRiwayat(){
        $this->resetPage();
        $this->pos = 2;
    }

    public function render()
    {
        $this->pendaftaran = OjtTujuan::where('nama_instansi', 'like',"%$this->searchPendaftaran%")
            ->orderBy('nama_instansi','asc')
            ->paginate(10,['*'],'pendaftaran');
        $this->riwayat = OjtTujuan::where('nama_instansi', 'like',"%$this->searchRiwayat%")
            ->orderBy('nama_instansi','asc')
            ->paginate(10,['*'],'riwayat');
        return view('livewire.ojt-c',[

        ]);
    }
}
