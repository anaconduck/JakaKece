<?php

namespace App\Http\Controllers;

use App\Models\OjtTujuan;
use Illuminate\Http\Request;

class PushOjtTujuan extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Instansi Magang',
                'link' => url('/admin/ojt/tujuan')
            ],
            [
                'title' => 'Tambah Instansi',
                'link' => url('/admin/ojt/tujuan/create')
            ]
            ];
    }
    public function index(){
        return view('admin.create-ojt-tujuan', [
            'title' => 'Tambah Instansi',
            'nav' => $this->nav
        ]);
    }

    public function push(Request $request){
        $request->validate([
            'nama_instansi' => 'required',
            'dalam_negeri' => 'required'
        ]);
        $tujuan = new OjtTujuan();
        $tujuan->nama_instansi = $request->get('nama_instansi');
        $tujuan->dalam_negeri = $request->get('dalam_negeri');
        if($tujuan->save()) return redirect(url('/admin/ojt/tujuan'));
        abort(500);
    }
}
