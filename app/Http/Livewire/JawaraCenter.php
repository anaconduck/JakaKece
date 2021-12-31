<?php

namespace App\Http\Livewire;

use App\Models\JawaraEvent;
use Livewire\Component;
use Livewire\WithPagination;

class JawaraCenter extends Component
{
    use WithPagination;

    public $nav;
    public $filter='nama';
    public $keyword;
    public $ind;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => 'Jawara Event',
                'link' => url('/admin/jawara/event')
            ]
        ];
    }

    public function show($id){
        return redirect('/admin/jawara/event/'.$id);
    }

    public function render()
    {
        $data = JawaraEvent::where('nama','like',"%$this->keyword%")
            ->orderBy($this->filter,'asc')
            ->paginate(10);

        $this->ind = 1;

        return view('livewire.jawara-center',[
            'event' => $data
            
        ])
            ->extends('layouts.admin',[
                'title' => 'Jawara Center Event',
                'nav' => $this->nav
            ])
            ->section('slot');
    }
}
