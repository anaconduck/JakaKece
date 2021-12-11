<?php

namespace App\Http\Controllers;

use App\Models\OjtMataKuliah;
use Illuminate\Http\Request;

class PushOjtMk extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Mk Magang',
                'link' => url('/admin/ojt/mk')
            ],
            [
                'title' => 'Tambah MK',
                'link' => url('/admin/ojt/mk/create')
            ]
            ];
    }
    public function index(){
        return view('admin.create-ojt-mk', [
            'title' => 'Tambah MK',
            'nav' => $this->nav
        ]);
    }

    public function push(Request $request){
        $request->validate([
            'nama_mata_kuliah' => 'required',
            'sks' => 'required|numeric|min:0'
        ]);

        $mk = new OjtMataKuliah();
        $mk->nama_mata_kuliah = $request->get('nama_mata_kuliah');
        $mk->sks = $request->get('sks');
        if($mk->save()) return redirect(url('/admin/ojt/mk'));
        abort(500);
    }
}
