<?php

namespace App\Http\Controllers;

use App\Models\ExchangeMataKuliah;
use Illuminate\Http\Request;

class UpdateMKExchange extends Controller
{
    public $nav;

    public function __construct()
    {
        $this->nav = [
            [
                'title' => "MK Student Exchange",
                'link' => url('/admin/se/mk')
            ]
            ];
    }

    public function index(ExchangeMataKuliah $mk){
        if(!$mk)
            abort(404);

        array_push($this->nav,[
            'title' => 'Update MK '.$mk->nama_mata_kuliah,
            'link' => url('/admin/se/mk/'.$mk->id)
        ]);

        return view('admin.update-exchange-mk',[
            'title' => 'Update Mk '.$mk->nama_mata_kuliah,
            'nav' => $this->nav,
            'mk' => $mk
        ]);
    }

    public function update(Request $request, ExchangeMataKuliah $mk){
        if(!$mk)
            abort(404);

        $request->validate([
            'nama_mata_kuliah' => 'required',
            'sks' => 'numeric|required'
        ]);

        if($request->get('submit') == 'update'){
            $mk->nama_mata_kuliah = $request->get('nama_mata_kuliah');
            $mk->sks = $request->sks;

            if($mk->save())
                return redirect('/admin/se/mk');
            
        }
        else if($request->get('submit') == 'delete'){
            $mk->delete();
            return redirect('/admin/se/mk');
        }
        abort(500);
    }
}
