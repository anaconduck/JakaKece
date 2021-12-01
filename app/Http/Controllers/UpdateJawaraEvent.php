<?php

namespace App\Http\Controllers;

use App\Models\JawaraEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateJawaraEvent extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Jawara Event',
                'link' => url('/admin/jawara/event')
            ]
        ];
    }
    public function index(JawaraEvent $event)
    {
        if (!$event) {
            abort(404);
        }
        array_push($this->nav, [
            'title' => 'Update Event',
            'link' => url('/admin/jawara/event/'.$event->id)
        ]);
        return view('admin.update-jawara-event', [
            'title' => 'Update Event Jawara',
            'nav' => $this->nav,
            'event' => $event
        ]);
    }
    public function update(Request $request, JawaraEvent $event)
    {
        if (!$event) {
            abort(404);
        }

        if ($request->get('submit') == 'update') {
            $request->validate([
                'nama' => 'required',
                'max_anggota' => 'required|numeric',
                'mulai_daftar' => 'required|date',
                'akhir_daftar' => 'required|date',
                'mulai' => 'required',
                'finish' => 'required|min:0|max:1'
            ]);

            $data = $request->only([
                'nama',
                'max_anggota',
                'mulai_daftar',
                'akhir_daftar',
                'mulai',
                'finish'
            ]);

            if($request->file('file')){
                if($event->file){
                    Storage::delete("$event->file");
                }
                $name = time().Str::random(5).$request->file('file')->getClientOriginalName();
                $path = $request->file('file')->storeAs("jawara/event",$name,"public");
                $event->file = $path;
            }
            $event->nama = $data['nama'];
            $event->max_anggota = $data['max_anggota'];
            $event->mulai_daftar = $data['mulai_daftar'];
            $event->akhir_daftar = $data['akhir_daftar'];
            $event->mulai = $data['mulai'];
            $event->finish = $data['finish'];
            if($event->save())
                return redirect(url('/admin/jawara/event'));
        }
        else if($request->get('submit') == 'delete'){
            $event->delete();
            return redirect(url('/admin/jawara/event'));
        }
        abort(500);
    }
}
