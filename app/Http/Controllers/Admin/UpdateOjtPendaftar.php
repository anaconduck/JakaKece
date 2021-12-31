<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OjtEvent;
use App\Models\OjtPaket;
use App\Models\OjtPendaftar;
use App\Models\OjtTujuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateOjtPendaftar extends Controller
{
    public $nav;

    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Pendaftar Magang',
                'link' => url('/admin/ojt/pendaftar')
            ]
        ];
    }
    public function index(OjtPendaftar $pendaftar)
    {
        if (!$pendaftar) abort(404);

        $paket = OjtPaket::find($pendaftar->id_paket);

        $tujuan = OjtTujuan::find($paket->id_ojt_tujuan);

        $magang = OjtEvent::find($paket->id_ojt_event);

        $mhs = User::where('identity', '=', $pendaftar->identity)
            ->first();

        $pendaftar->file = json_decode($pendaftar->file, true);

        array_push($this->nav, [
            'title' => $pendaftar->id,
            'link' => url('/admin/ojt/pendaftar/' . $pendaftar->id)
        ]);

        return view('admin.update-ojt-pendaftar', [
            'title' => 'Informasi Pendaftar Magang',
            'nav' => $this->nav,
            'tujuan' => $tujuan,
            'magang' => $magang,
            'mhs' => $mhs,
            'pendaftar' => $pendaftar
        ]);
    }

    public function hapus(OjtPendaftar $pendaftar, $ind)
    {
        if (!$pendaftar) abort(404);

        $file = $pendaftar->file = json_decode($pendaftar->file, true);
        if (strlen($ind) !== 2) abort(404);
        $index = substr($ind, 1, 1);
        $path = substr($pendaftar->file[$ind], 8, strlen($pendaftar->file[$ind]));
        Storage::delete($path);
        unset($file[$ind]);

        $size = sizeof($file) - sizeof(config('app.dokumentasi_ojt'));
        for ($i = $index; $i < $size; $i++) {
            $file['_' . $i] = $file['_' . ($i + 1)];
        }
        unset($file['_' . $size]);

        $pendaftar->file = json_encode($file);
        if ($pendaftar->save(['file'])) return redirect()->back();
        abort(500);
    }

    public function update(Request $request, OjtPendaftar $pendaftar)
    {
        if (!$pendaftar) abort(404);

        if ($request->get('submit') == 'update') {
            $request->validate([
                'status_pendaftaran' => 'required|min:0|max:2|numeric',
                'status_kelulusan' => 'required|min:0|max:1|numeric',
            ]);
            $periode = null;
            if ($pendaftar->status_pendaftaran != 2 and $request->get('status_pendaftaran') == 2) {
                $time = strtotime($pendaftar->created_at) - strtotime(config('app.periode.batas_awal') . config('app.periode.start'));
                $periode = 0;
                $tahun = config('app.periode.start');
                while (true) {
                    $tgl = null;
                    if ($periode % 2 == 0) {
                        $tgl = config('app.periode.batas_tengah') . ' ' . $tahun;
                    } else {
                        $tahun += 1;
                        $tgl = config('app.periode.batas_awal') . ' ' . $tahun;
                    }
                    $time = strtotime($pendaftar->created_at) - strtotime($tgl);
                    $periode += 1;
                    if ($time < 0) break;
                }
                $data['periode'] = $periode;
                dd($data);
            }else if($pendaftar->status_pendaftaran==2 and $request->get('status_pendaftaran')!=2){
                $periode = null;
            }
            $pendaftar->status_pendaftaran = $request->get('status_pendaftaran');
            $pendaftar->status_kelulusan = $request->get('status_kelulusan');
            $pendaftar->catatan = $request->get('catatan');
            $pendaftar->periode = $periode;

            if ($pendaftar->save()) return redirect(url('/admin/ojt/pendaftar'));
        } elseif ($request->get('submit') == 'delete') {
            $pendaftar->delete();
            return redirect(url('/admin/ojt/pendaftar'));
        }
        abort(500);
    }
}
