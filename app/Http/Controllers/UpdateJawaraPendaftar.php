<?php

namespace App\Http\Controllers;

use App\Models\JawaraEvent;
use App\Models\JawaraPendaftar;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;

class UpdateJawaraPendaftar extends Controller
{
    public $nav;

    public function __construct()
    {
        $this->nav = [
            [
                'title' => "Jawara Pendaftar",
                'link' => url('/admin/jawara/pendaftar')
            ]
        ];
    }

    public function index(JawaraPendaftar $pendaftar)
    {
        if (!$pendaftar)
            abort(404);
        
        $pendaftar->id_mahasiswa = array_values(json_decode($pendaftar->id_mahasiswa));

        $mahasiswa = User::whereIn('identity',$pendaftar->id_mahasiswa)
            ->get();
        
        $event = JawaraEvent::find($pendaftar->id_jawara_event);

        array_push($this->nav,[
            'title' => $event->nama,
            'link' => url('/admin/jawara/pendaftar/'.$pendaftar->id)
        ]);

        $dosen = User::select('name','identity', 'status')
            ->where('status', '=', 'dosen')
            ->get();

        return view('admin.update-jawara-pendaftar', [
            'nav' => $this->nav,
            'title' => 'Jawara Pendaftar',
            'pendaftar' => $pendaftar,
            'mahasiswa' => $mahasiswa,
            'dosen' => $dosen,
            'event' => $event
        ]);
    }

    public function update(Request $request, JawaraPendaftar $pendaftar){
        if(!$pendaftar)
            abort(404);
        
        $request->validate([
            'status' => 'required|min:0|max:2',
            'dosen' => 'required'
        ]);

        $data = $request->only(['status','dosen']);

        if($request->get('submit') == 'update'){
            $pendaftar->status = $data['status'];
            $pendaftar->id_dosen = $data['dosen'];

            if($pendaftar->save())
                return redirect(url('/admin/jawara/pendaftar'));
        }
        else if($request->get('submit') == 'delete'){
            $pendaftar->delete();
            return redirect(url('/admin/jawara/pendaftar'));
        }
        abort(500);
    }
}
