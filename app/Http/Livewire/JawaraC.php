<?php

namespace App\Http\Livewire;

use App\Models\JawaraEvent;
use App\Models\JawaraTanya;
use Livewire\Component;
use Livewire\WithPagination;

class JawaraC extends Component
{
    use WithPagination;

    public $searchPendaftaran;
    public $searchTerlaksana;
    public $pos = 0;
    public $pendaftaran;
    public $terlaksana;
    public $statusTanya;
    public $pertanyaan;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        if (auth()->user()) {
            $this->pertanyaan = [
                'identity' => auth()->user()->identity
            ];
        }
    }

    public function updatingSearchPendaftaran()
    {
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingSearchTerlaksana()
    {
        $this->resetPage();
        $this->pos = 1;
    }

    public function updatingPendaftaran()
    {
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingTerlaksana()
    {
        $this->resetPage();
        $this->pos = 1;
    }
    public function updatingPertanyaan()
    {
        $this->pos = 2;
    }

    public function submit()
    {
        $this->validate([
            'pertanyaan.email' => 'required|email',
            'pertanyaan.pertanyaan' => 'required|max:255'
        ]);
        $this->statusTanya = (JawaraTanya::tanya($this->pertanyaan));
    }

    public function render()
    {
        $this->pendaftaran = JawaraEvent::where('akhir_daftar', '>', now())
            ->where('nama', 'like', '%' . $this->searchPendaftaran . '%')
            ->orderBy('akhir_daftar', 'asc')
            ->paginate(10, ['*'], 'pendaftaran');
        $this->terlaksana = JawaraEvent::where('mulai', '<=', now())
            ->where('nama', 'like', '%' . $this->searchTerlaksana . '%')
            ->orderBy('mulai', 'desc')
            ->paginate(10, ['*'], 'terlaksana');
        return view('livewire.jawara-c', []);
    }
}
