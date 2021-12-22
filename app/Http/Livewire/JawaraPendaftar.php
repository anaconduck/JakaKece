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

    //statistik
    public $labels;

    public function mount()
    {
        $this->nav = [
            [
                'title' => 'Jawara Pendaftar',
                'link' => url('/admin/jawara/pendaftar')
            ]
        ];
        $this->labels = array();
    }

    public function show($id)
    {
        return redirect('/admin/jawara/pendaftar/' . $id);
    }

    public function render()
    {
        $this->ind = 1;
        $data = JP::select('jawara_pendaftars.*', 'dosens.nama_lengkap as nama_dosen', 'jawara_events.nama')
            ->join('jawara_events', 'jawara_events.id', '=', 'jawara_pendaftars.id_jawara_event')
            ->leftJoin('dosens', 'jawara_pendaftars.id_dosen', '=', 'dosens.id')
            ->where('jawara_events.nama', 'like', "%$this->keyword%")
            ->orWhere('jawara_pendaftars.id_mahasiswa', 'like', "%$this->keyword%")
            ->orWhere('dosens.nama_lengkap', 'like', "%$this->keyword%")
            ->paginate(10);

        $pointer = JP::pointer();
        foreach ($pointer as $p) {
            $label = null;
            $thn = config('app.periode.start') + ceil($p->periode / 2);
            if ($p->periode % 2 == 0) {
                $label = 'Genap ' . ($thn - 1) . '/' . ($thn);
            } else {
                $label = 'Ganjil ' . ($thn - 1) . '/' . ($thn);
            }
            if (!isset($this->labels[$label])) {
                $this->labels[$label] = 1;
            } else $this->labels[$label] += 1;
        }
        return view('livewire.jawara-pendaftar', [
            'pendaftar' => $data
        ])
            ->extends('layouts.admin', [
                'nav' => $this->nav,
                'title' => 'Jawara Pendaftar'
            ])
            ->slot('slot');
    }
}
