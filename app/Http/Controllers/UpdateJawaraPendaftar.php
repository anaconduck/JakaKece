<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
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
        $pendaftar->file = json_decode($pendaftar->file, true);

        $mahasiswa = User::whereIn('identity',$pendaftar->id_mahasiswa)
            ->get();

        $event = JawaraEvent::find($pendaftar->id_jawara_event);

        array_push($this->nav,[
            'title' => $event->nama,
            'link' => url('/admin/jawara/pendaftar/'.$pendaftar->id)
        ]);

        $dosen = Dosen::where('pembimbing', true)
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
            'status' => 'required|min:0|max:1',
            'dosen' => 'required',
            'status_pendanaan' => 'required|min:0|max:1',
            'pendanaan' => 'numeric'
        ]);

        $data = $request->only(['status','dosen','status_pendanaan','catatan_pembimbing', 'catatan_pendanaan', 'pendanaan']);

        $dosen = Dosen::find($data['dosen']);

        if($request->get('submit') == 'update'){
            $pendaftar->status = $data['status'];
            if($dosen) $pendaftar->id_dosen = $data['dosen'];
            $pendaftar->status_pendanaan = $data['status_pendanaan'];
            $pendaftar->catatan_pembimbing = $data['catatan_pembimbing'];
            $pendaftar->catatan_pendanaan = $data['catatan_pendanaan'];
            $pendaftar->pendanaan = $data['pendanaan'];

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
