<?php

namespace App\Http\Livewire\Admin;

use App\Models\ExchangeTanya;
use App\Models\JawaraTanya;
use App\Models\OjtTanya;
use Livewire\Component;
use Livewire\WithPagination;

class Tanya extends Component
{
    use WithPagination;
    public $menu;
    public $ind = 1;
    public $keyword;
    protected $paginationTheme = 'bootstrap';

    public function mount($menu)
    {
        if ($menu == 'jawara' or $menu == 'se' or $menu == 'ojt') $this->menu = $menu;
        else abort(404);
    }

    public function show($id)
    {
        return redirect(url('/admin/jawab/'.$this->menu.'/'.$id));
    }
    public function render()
    {
        $this->ind = 1;
        $pertanyaan = null;
        switch ($this->menu) {
            case 'jawara': {
                    $pertanyaan = JawaraTanya::where('identity', 'like', "%$this->keyword%")
                        ->orWhere('email', 'like', "%$this->keyword%")
                        ->orWhere('pertanyaan', 'like', "%$this->keyword%")
                        ->orderBy('terjawab', 'asc')
                        ->orderBy('id', 'desc')
                        ->paginate(10);
                    break;
                }
            case 'se': {
                    $pertanyaan = ExchangeTanya::where('identity', 'like', "%$this->keyword%")
                        ->orWhere('email', 'like', "%$this->keyword%")
                        ->orWhere('pertanyaan', 'like', "%$this->keyword%")
                        ->orderBy('terjawab', 'asc')
                        ->orderBy('id', 'desc')
                        ->paginate(10);
                    break;
                }
            case 'ojt': {
                    $pertanyaan = OjtTanya::where('identity', 'like', "%$this->keyword%")
                        ->orWhere('email', 'like', "%$this->keyword%")
                        ->orWhere('pertanyaan', 'like', "%$this->keyword%")
                        ->orderBy('terjawab', 'asc')
                        ->orderBy('id', 'desc')
                        ->paginate(10);
                }
        }
        return view('livewire.admin.tanya', [
            'pertanyaan' => $pertanyaan
        ])
            ->extends('layouts.admin', [
                'title' => 'Tanya Admin'
            ])
            ->slot('slot');
    }
}
