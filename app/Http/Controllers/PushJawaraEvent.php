<?php

namespace App\Http\Controllers;

use App\Models\JawaraEvent;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class PushJawaraEvent extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Jawara Event',
                'link' => url('/admin/jawara/event')
            ],
            [
                'title' => 'Tambah Event',
                'link' => url('/admin/jawara/event/create')
            ]
        ];
    }
    public function index()
    {
        return view('admin.create-jawara-event', [
            'title' => 'Tambah Jawara Event',
            'nav' => $this->nav
        ]);
    }
    public function push(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'max_anggota' => 'required|numeric',
            'mulai_daftar' => 'required|date',
            'akhir_daftar' => 'required|date',
            'mulai' => 'required',
            'mulai_time' => 'required',
            'finish' => 'required|min:0|max:1',
            'laman' => 'string'
        ]);
        $mulai = strtotime($request->get('mulai'));
        $waktu = date("Y-m-d", strtotime(now("Asia/Jakarta")));
        $interval =  strtotime($request->get('mulai_time')) - strtotime($waktu);
        $mulai += $interval;
        $data = $request->only([
            'nama',
            'max_anggota',
            'mulai_daftar',
            'akhir_daftar',
            'finish',
            'laman'
        ]);
        $data['mulai'] = date("Y-m-d H:i", $mulai);
        $periode = 0;
        $time = $mulai - strtotime(config('app.periode.batas_awal') . config('app.periode.start'));
        $tahun = config('app.periode.start');
        while (true) {
            $tgl = null;
            if ($periode % 2 == 0) {
                $tgl = config('app.periode.batas_tengah') . ' ' . $tahun;
            } else {
                $tahun += 1;
                $tgl = config('app.periode.batas_awal') . ' ' . $tahun;
            }
            $time = $mulai - strtotime($tgl);
            if ($time < 0) break;
            $periode += 1;
        }
        $data['periode'] = $periode;
        if ($request->hasFile('file')) {
            $name = time() . Str::random(5) . $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->storeAs("jawara/event", $name, 'public');
            $data['file'] = $path;
            JawaraEvent::pushEvent($data);
            return redirect(url('/admin/jawara/event'));
        } else {
            JawaraEvent::pushEvent($data);
            return redirect(url('/admin/jawara/event'));
        }
        abort(500);
    }
}
