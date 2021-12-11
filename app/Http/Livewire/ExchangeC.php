<?php

namespace App\Http\Livewire;

use App\Models\ExchangeTanya;
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
    public $pos = 0;
    public $dn;
    public $ln;
    public $riwayat;
    public $pertanyaan;
    public $statusTanya = false;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        if (auth()->user()) {
            $this->pertanyaan = [
                'identity' => auth()->user()->identity
            ];
        }
    }

    public function updatingSearchDn()
    {
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingSearchLn()
    {
        $this->resetPage();
        $this->pos = 1;
    }
    public function updatingSearchRiwayat()
    {
        $this->resetPage();
        $this->pos = 2;
    }

    public function updatingDn()
    {
        $this->resetPage();
        $this->pos = 0;
    }
    public function updatingLn()
    {
        $$this->resetPage();
        $this->pos = 1;
    }
    public function updatingRiwayat()
    {
        $this->resetPage();
        $this->pos = 2;
    }
    public function updatingPertanyaan()
    {
        $this->pos = 3;
    }

    public function submit()
    {
        $this->validate([
            'pertanyaan.email' => 'required|email',
            'pertanyaan.pertanyaan' => 'required|max:255'
        ]);
        $this->statusTanya = ExchangeTanya::tanya($this->pertanyaan);
    }

    public function render()
    {
        $this->dn = ExchangeTujuan::where('dalam_negeri', true)
            ->where('nama_universitas', 'like', '%' . $this->searchDn . '%')
            ->orderBy('nama_universitas', 'asc')
            ->paginate(10, ['*'], 'dn');
        $this->ln = ExchangeTujuan::where('dalam_negeri', false)
            ->where('nama_universitas', 'like', '%' . $this->searchLn . '%')
            ->orderBy('nama_universitas', 'asc')
            ->paginate(10, ['*'], 'ln');
        $this->riwayat = ExchangeTujuan::orderBy('nama_universitas', 'asc')
            ->paginate(10, ['*'], 'riwayat');
        return view('livewire.exchange-c', []);
    }
}
