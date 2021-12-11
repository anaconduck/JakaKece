<?php

namespace App\Http\Livewire;

use App\Models\OjtPaket;
use App\Models\OjtTanya;
use App\Models\OjtTujuan;
use Livewire\Component;
use Livewire\WithPagination;

class OjtC extends Component
{
    use WithPagination;

    public $searchPendaftaran;
    public $searchTerlaksana;
    public $pos = 0;
    public $pendaftaran;
    public $terlaksana;
    public $pertanyaan;
    public $statusTanya = false;


    protected $paginationTheme = 'bootstrap';

    public function mount(){
        if (auth()->user()) {
            $this->pertanyaan = [
                'identity' => auth()->user()->identity
            ];
        }
        $this->terlaksana = OjtPaket::select('ojt_pakets.id','ojt_events.nama_event','ojt_tujuans.nama_instansi')
            ->join('ojt_events','ojt_pakets.id_ojt_event','=','ojt_events.id')
            ->join('ojt_tujuans','ojt_pakets.id_ojt_tujuan','=','ojt_tujuans.id')
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

    public function updatingPendaftaran(){
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingTerlaksana(){
        $this->resetPage();
        $this->pos = 1;
    }
    public function submit(){
        $this->validate([
            'pertanyaan.email' => 'required|email',
            'pertanyaan.pertanyaan' => 'required|max:255'
        ]);
        $this->statusTanya = OjtTanya::tanya($this->pertanyaan);
    }

    public function render()
    {
        $this->pendaftaran = OjtPaket::select('ojt_pakets.id','ojt_tujuans.nama_instansi')
        ->join('ojt_tujuans','ojt_pakets.id_ojt_tujuan','=','ojt_tujuans.id')
        ->where('ojt_pakets.akhir_daftar','>',now())
        ->orderBy('ojt_pakets.created_at','desc')
        ->paginate(10,['*'],'pendaftaran');

        return view('livewire.ojt-c',[

        ]);
    }
}
