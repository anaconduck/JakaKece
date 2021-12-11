<?php

namespace App\Http\Livewire\Admin;

use App\Models\OjtEvent;
use Livewire\Component;
use Livewire\WithPagination;

class OjtEventController extends Component
{
    use WithPagination;

    public $nav;
    public $filter = 'nama_event';
    public $keyword;
    public $ind;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => 'OJT Event',
                'link' => url('admin/ojt/event')
            ]
        ];
    }

    public function show($id){
        return redirect('/admin/ojt/event/'.$id);
    }

    public function render()
    {
        $this->ind = 1;
        $data = OjtEvent::where('nama_event', 'like', "%$this->keyword%")
            ->orWhere('max_konversi_sks', 'like', "%$this->keyword%")
            ->orderBy($this->filter, 'asc')
            ->paginate(10);
        return view('livewire.admin.ojt-event-controller',[
            'event' => $data
        ])
            ->extends('layouts.admin', [
                'nav' => $this->nav,
                'title' => 'OJT Event'
            ])
            ->slot('slot');
    }
}
