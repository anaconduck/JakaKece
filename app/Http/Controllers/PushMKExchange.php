<?php

namespace App\Http\Controllers;

use App\Models\ExchangeMataKuliah;
use Illuminate\Http\Request;

class PushMKExchange extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Mk Student Exchange',
                'link' => url('/admin/se/mk')
            ]
            ];
    }

    public function index(){
        array_push($this->nav,[
            'title' => 'Tambah MK',
            'link' => url('/admin/se/mk/create')
        ]);

        return view('admin.create-exchange-mk',[
            'title' => 'Tambah MK',
            'nav' => $this->nav
        ]);
    }

    public function push(Request $request){
        $request->validate([
            'nama_mata_kuliah' => 'required',
            'sks' => 'required|numeric'
        ]);

        $data = $request->only([
            'nama_mata_kuliah',
            'sks'
        ]);

        ExchangeMataKuliah::pushMK($data);

        
        return redirect('/admin/se/mk');
    }
}
