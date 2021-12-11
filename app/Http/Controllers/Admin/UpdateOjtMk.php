<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OjtMataKuliah;
use Illuminate\Http\Request;

class UpdateOjtMk extends Controller
{
    public $nav;

    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'MK Magang',
                'link' => url('/admin/se/mk')
            ]
        ];
    }

    public function index(OjtMataKuliah $mk)
    {
        if(!$mk) abort(404);
        array_push($this->nav, [
            'title' => $mk->nama_mata_kuliah,
            'link' => url('/admin/se/tujuan/' . $mk->id)
        ]);
        return view('admin.update-ojt-mk', [
            'title' => 'Tambah Tujuan SE',
            'nav' => $this->nav,
            'mk' => $mk
        ]);
    }

    public function update(Request $request, OjtMataKuliah $mk){
        if(!$mk) abort(404);
        if($request->get('submit') == 'update'){
            $request->validate([
                'nama_mata_kuliah' => 'required',
                'sks' => 'required|numeric|min:0'
            ]);
            $mk->nama_mata_kuliah = $request->get('nama_mata_kuliah');
            $mk->sks = $request->get('sks');

            if($mk->save()) return redirect(url('/admin/ojt/mk'));
        }
        elseif($request->get('submit') == 'delete'){
            $mk->delete();
            return redirect(url('/admin/ojt/mk'));
        }
        abort(500);
    }
}
