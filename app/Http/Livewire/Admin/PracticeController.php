<?php

namespace App\Http\Livewire\Admin;

use App\Models\Practice;
use Livewire\Component;
use Livewire\WithPagination;

class PracticeController extends Component
{
    use WithPagination;


    public $nav;
    public $filter = "id_course";
    public $keyword;
    public $ind= 1;
    protected $paginationTheme = 'bootstrap';

    public function mount(){
        $this->nav = [
            [
                'title' => 'Practice',
                'link' => url('/admin/inkubasi/practice')
            ]
            ];
    }

    public function show($id){
        return redirect('/admin/inkubasi/practice/'.$id);
    }

    public function render()
    {
        $data = Practice::where('teks', 'like', "%$this->keyword%")
            ->orWhere('soal', 'like', "%$this->keyword%")
            ->orderBy($this->filter, 'asc')
            ->paginate('10');

        $this->ind = 1;
        return view('livewire.admin.practice-controller',[
            'quest' => $data
        ])
            ->extends('layouts.admin',[
                'title' => 'Practice',
                'nav' => $this->nav
            ])
            ->section('slot');
    }
}
