<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OjtEvent;
use Illuminate\Http\Request;

class UpdateOjtEvent extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Ojt Event',
                'link' => url('/admin/ojt/event')
            ]
            ];
    }

    public function index(OjtEvent $event){
        if(!$event) abort(404);

        array_push($this->nav, [
            'title' => 'Update Ojt Event',
            'link' => url('/admin/ojt/event/'.$event->id)
        ]);

        return view('admin.update-ojt-event', [
            'title' => 'Update Ojt Event',
            'nav' => $this->nav,
            'event' => $event
        ]);
    }

    public function update(Request $request, OjtEvent $event){
        if(!$event) abort(404);

        if($request->get('submit') == 'update'){
            $request->validate([
                'nama_event' => 'required',
                'max_konversi_sks' => 'required',
                'id_prodi' => 'required'
            ]);

            if($request->get('id_prodi') < 1 and $request->get('id_prodi') > sizeof(config('app.prodi'))) abort(500);

            $event->nama_event = $request->get('nama_event');
            $event->max_konversi_sks = $request->get('max_konversi_sks');
            $event->id_prodi = $request->get('id_prodi');

            if($event->save()) return redirect(url('/admin/ojt/event'));
        }elseif($request->get('submit') == 'delete'){
            $event->delete();
            return redirect(url('/admin/ojt/event'));
        }
        abort(500);
    }
}
