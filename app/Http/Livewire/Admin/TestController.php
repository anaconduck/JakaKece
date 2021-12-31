<?php

namespace App\Http\Livewire\Admin;

use App\Models\Test;
use Livewire\Component;
use Livewire\WithPagination;

class TestController extends Component
{
    use WithPagination;

    public $nav;
    public $filter = 'id_course';
    public $keyword;
    public $ind = 1;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => 'Test',
                'link' => url('/admin/inkubasi/test')
            ]
            ];
    }

    public function show($id){
        return redirect('/admin/inkubasi/test/'.$id);
    }
    

    public function render()
    {
        $data = Test::where('teks','like',"%$this->keyword%")
            ->orWhere('soal', 'like',"%$this->keyword%")
            ->orderBy($this->filter,'asc')
            ->paginate(10);

        $this->ind = 1;

        return view('livewire.admin.test-controller',[
            'quest' => $data
        ])
            ->extends('layouts.admin',[
                'title' => 'Test',
                'nav' => $this->nav
            ])
            ->section('slot');
    }
}
