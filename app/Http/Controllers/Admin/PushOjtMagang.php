<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OjtEvent;
use App\Models\OjtPaket;
use App\Models\OjtTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PushOjtMagang extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Magang Tersedia',
                'link' => url('/admin/ojt/magang')
            ],
            [
                'title' => 'Tambah Magang',
                'link' => url('/admin/ojt/magang/create')
            ]
        ];
    }
    public function index()
    {
        $instansi = OjtTujuan::lazy();
        $event = OjtEvent::lazy();
        return view('admin.create-ojt-magang', [
            'title' => 'Tambah Magang',
            'nav' => $this->nav,
            'instansi' => $instansi,
            'event' => $event
        ]);
    }

    public function push(Request $request)
    {
        $request->validate([
            'id_ojt_tujuan' => 'required|numeric|min:0',
            'id_ojt_event' => 'required|numeric|min:0',
            'mulai_daftar' => 'required|date',
            'akhir_daftar' => 'required|date',
            'mulai_training' => 'required|date',
            'akhir_training' => 'required|date',
            'file_pelaksanaan' => 'required'
        ]);

        if(strtotime($request->get('akhir_daftar')) < strtotime($request->get('mulai_daftar')) or strtotime($request->get('akhir_training')) < strtotime($request->get('mulai_training'))) return redirect()->back()->with('er', 'Waktu akhir tidak dapat kurang dari waktu mulai!');

        if (!(OjtTujuan::find($request->get('id_ojt_tujuan')))) abort(500);
        else if (!(OjtEvent::find($request->get('id_ojt_event')))) abort(500);

        if ($request->hasFile('file_pelaksanaan')) {
            $magang = new OjtPaket($request->only([
                'id_ojt_tujuan',
                'id_ojt_event',
                'mulai_daftar',
                'akhir_daftar',
                'mulai_training',
                'akhir_training',
                'file_pelaksanaan'
            ]));
            $name = time().Str::random(3).$request->file('file_pelaksanaan')->getClientOriginalName();
            $path = $request->file('file_pelaksanaan')->storeAs('ojt/pelaksanaan',$name, 'local');
            $magang->file_pelaksanaan = $path;
            if($magang->save()) return redirect(url('/admin/ojt/magang'));
        }
        abort(500);
    }
}
