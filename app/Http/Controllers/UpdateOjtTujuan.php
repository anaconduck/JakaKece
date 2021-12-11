<?php

namespace App\Http\Controllers;

use App\Models\OjtTujuan;
use Illuminate\Http\Request;
use Whoops\Run;

class UpdateOjtTujuan extends Controller
{
    public $nav;

    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Insansi Magang',
                'link' => url('/admin/se/tujuan')
            ]
        ];
    }

    public function index(OjtTujuan $tujuan)
    {
        array_push($this->nav, [
            'title' => $tujuan->nama_instansi,
            'link' => url('/admin/se/tujuan/' . $tujuan->id)
        ]);
        return view('admin.update-ojt-tujuan', [
            'title' => 'Tambah Tujuan SE',
            'nav' => $this->nav,
            'tujuan' => $tujuan
        ]);
    }

    public function update(Request $request, OjtTujuan $tujuan)
    {
        if (!$tujuan) abort(404);

        if ($request->get('submit') == 'update') {
            $request->validate([
                'nama_instansi' => 'required',
                'dalam_negeri' => 'required'
            ]);

            $tujuan->nama_instansi = $request->get('nama_instansi');
            $tujuan->dalam_negeri = $request->get('dalam_negeri');

            if($tujuan->save()) return redirect(url('/admin/ojt/tujuan'));
        } elseif ($request->get('submit') == 'delete') {
            $tujuan->delete();
            return redirect(url('/admin/ojt/tujuan'));
        }
        abort(500);
    }
}
