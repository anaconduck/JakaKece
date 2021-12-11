<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OjtEvent;
use Illuminate\Http\Request;

class PushOjtEvent extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Ojt Event',
                'link' => url('/admin/ojt/event')
            ],
            [
                'title' => 'Tambah Event',
                'link' => url('/admin/ojt/event/create')
            ]
            ];
    }
    public function index(){
        return view('admin.create-ojt-event', [
            'title' => 'Tambah Event Ojt',
            'nav' => $this->nav
        ]);
    }

    public function push(Request $request){
        $request->validate([
            'nama_event' => 'required',
            'max_konversi_sks' => 'required',
            'id_prodi' => 'required'
        ]);
        $event = new OjtEvent();
        $event->nama_event = $request->get('nama_event');
        $event->max_konversi_sks = $request->get('max_konversi_sks');
        $event->id_prodi = $request->get('id_prodi');
        if($event->save()) return redirect(url('/admin/ojt/event'));
        abort(500);
    }
}
