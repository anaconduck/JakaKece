<?php

namespace App\Http\Livewire\Admin;

use App\Models\ExchangePendaftar;
use Livewire\Component;
use Livewire\WithPagination;

class SEPendaftar extends Component
{
    use WithPagination;

    public $nav;
    public $filter ='created_at';
    public $keyword;
    public $ind;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => 'SE Pendaftar',
                'link' => url('/admin/se/pendaftar')
            ]
        ];
    }

    public function show($id){
        return redirect('/admin/se/pendaftar/'.$id);
    }

    public function render()
    {
        $this->ind = 1;
        $data = ExchangePendaftar::select('exchange_pendaftars.*', 'exchange_tujuans.nama_universitas', 'users.name')
            ->join('exchange_tujuans', 'exchange_pendaftars.id_exchange_tujuan', '=', 'exchange_tujuans.id')
            ->join('users', 'users.identity', '=', 'exchange_pendaftars.identity')
            ->where('users.name', 'like', "%$this->keyword%")
            ->orWhere('exchange_tujuans.nama_universitas', 'like', "%$this->keyword%")
            ->orWhere('exchange_pendaftars.identity', 'like',"%$this->keyword%")
            ->orderBy($this->filter, 'desc')
            ->paginate(10);
        return view('livewire.admin.s-e-pendaftar',[
            'pendaftar' => $data
        ])
            ->extends('layouts.admin',[
                'nav' => $this->nav,
                'title' => 'SE Pendaftar'
            ])
            ->slot('slot');
    }
}
