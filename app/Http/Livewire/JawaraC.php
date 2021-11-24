<?php

namespace App\Http\Livewire;

use App\Models\JawaraEvent;
use Livewire\Component;
use Livewire\WithPagination;

class JawaraC extends Component
{
    use WithPagination;

    public $searchPendaftaran;
    public $searchMendatang;
    public $searchTerlaksana;
    public $searchHasil;
    public $pos=0;
    public $pendaftaran;
    public $mendatang;
    public $terlaksana;
    public $hasil;

    protected $paginationTheme = 'bootstrap';

    public function mount(){

    }

    public function updatingSearchPendaftaran(){
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingSearchMendatang(){
        $this->resetPage();
        $this->pos = 1;
    }
    public function updatingSearchTerlaksana(){
        $this->resetPage();
        $this->pos = 2;
    }
    public function updatingSearchHasil(){
        $this->resetPage();
        $this->pos = 3;
    }

    public function updatingPendaftaran(){
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingMendatang(){
        $this->resetPage();
        $this->pos = 1;
    }
    public function updatingTerlaksana(){
        $this->resetPage();
        $this->pos = 2;
    }
    public function updatingHasil(){
        $this->resetPage();
        $this->pos = 3;
    }

    public function render()
    {
        $this->pendaftaran = JawaraEvent::where('mulai_daftar','<',now())
            ->where('akhir_daftar','>',now())
            ->where('nama','like','%'.$this->searchPendaftaran.'%')
            ->orderBy('akhir_daftar','desc')
            ->paginate(10,['*'],'pendaftaran');
        $this->mendatang = JawaraEvent::where('mulai_daftar','>',now())
            ->where('nama','like','%'.$this->searchMendatang.'%')
            ->orderBy('mulai_daftar','desc')
            ->paginate(10,['*'],'mendatang');
        $this->terlaksana = JawaraEvent::where('mulai','<',now())
            ->where('finish',false)
            ->where('nama','like','%'.$this->searchTerlaksana.'%')
            ->orderBy('mulai','desc')
            ->paginate(10,['*'],'terlaksana');
        $this->hasil = JawaraEvent::where('finish',true)
            ->orderBy('mulai','desc')
            ->where('nama','like','%'.$this->searchHasil.'%')
            ->paginate(10,['*'],'hasil');
        return view('livewire.jawara-c',[
        ]);
    }
}
