<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiSistem;
use App\Models\Dosen;
use App\Models\JawaraEvent;
use App\Models\JawaraPendaftar;
use App\Models\JawaraTanya;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\JsonDecoder;

class Jawara extends Controller
{
    public $nav;

    public function __construct()
    {

        $this->nav = [
            [
                'title' => 'Jawara Center',
                'link' => url('/jawara')
            ]
        ];
    }

    public function index($message = [-1])
    {
        $slides = DeskripsiSistem::getDeskripsiSistem(config('app.fitur.jawara'));
        return view('jawara', [
            'title' => 'Jawara Center',
            'jawara' => 'selected',
            'nav' => $this->nav,
            'totalPendaftar' => JawaraPendaftar::count(),
            'totalJawara' => JawaraPendaftar::countPemenang(),
            'totalLomba' => JawaraEvent::count(),
            'message' => $message,
            'slides' => $slides,
            'section' => Request('s')
        ]);
    }

    public function showDaftar(JawaraEvent $event)
    {
        if (!$event)
            abort(404);
        $now = strtotime(now());
        $daftar = strtotime($event->mulai_daftar);
        $akhir = strtotime($event->akhir_daftar);
        if ($now < $daftar or $akhir < $now) {
            abort(404);
        }

        array_push($this->nav, [
            'title' => 'pendaftaran ' . $event->nama,
            'link' => url("/jawara/$event->id")
        ]);
        return view('pendaftaran-jawara', [
            'title' => 'Pendaftaran Jawara Event ' . $event->nama,
            'jawara' => 'selected',
            'nav' => $this->nav,
            'event' => $event,
            'ind' => 0,
            'dosen' => Dosen::getDosenPembimbing()
        ]);
    }

    public function daftar(Request $request, JawaraEvent $event)
    {
        if (!$event) abort(404);

        $now = strtotime(now());
        $daftar = strtotime($event->mulai_daftar);
        $akhir = strtotime($event->akhir_daftar);
        if ($now < $daftar or $akhir < $now) {
            abort(404);
        }
        $request->validate([
            'dosen' => 'numeric|required',
            'file' => 'bail|required|max:10240|mimetypes:image/jpeg,image/jpg,image/png,image/gif,application/msword,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf',
            'bukti' => 'bail|required|max:10240|mimetypes:image/jpeg,image/jpg,image/png,image/gif,application/msword,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf',
        ]);

        $data = $request->all();
        unset($data['_token']);
        $idDosen = $data['dosen'];
        unset($data['dosen']);
        unset($data['file']);
        if ($idDosen == 0)
            $idDosen = null;
        $nim = [];
        $num = 0;

        foreach ($data as $k => $d) {
            if (strpos($k, 'nim') !== false and $d != null) {
                array_push($nim, $d);
                $num++;
            }
        }
        sort($nim);
        $idPendaftar = $event->id . implode('', $nim);
        $pendaftar = JawaraPendaftar::find($idPendaftar);
        if($pendaftar and $pendaftar->status!='0') return $this->index([1, 'Anda sudah terdaftar dalam event jawara '.$event->nama]);
        if ($pendaftar) {
            $file = json_decode($pendaftar->file,true);
            if($request->hasFile('file')){
                if($file['pendanaan']){
                    Storage::delete($file['pendanaan']);
                }
                $filename = time().'_'.Str::random(3).$request->file('file')->getClientOriginalName();
                $path = $request->file('file')->storeAs('jawara/pendanaan', $filename, 'local');
                $file['pendanaan'] = $path;
            }
            if($request->hasFile('bukti')){
                if($file['bukti']){
                    Storage::delete($file['bukti']);
                }
                $filename = time().Str::random(3).request()->file('bukti')->getClientOriginalName();
                $path = $request->file('bukti')->storeAs('jawara/bukti', $filename, 'local');
                $file['bukti'] = $path;
            }
            $pendaftar->file = json_encode($file);
            $pendaftar->id_dosen = $idDosen;
            if($pendaftar->save(['file','id_dosen']))
                return $this->index([1, 'Data Anda telah terbarui. Tunggu info selanjutnya!']);
            return $this->index([0, 'Gagal memperbarui informasi pendaftar!']);
        }

        $mhs = Mahasiswa::countMahasiswa($nim);
        if ($mhs == $num) {
            $file = [];
            if ($request->hasFile('file')) {
                $filename = time() . '_' . Str::random(3) . $request->file('file')->getClientOriginalName();
                $path = $request->file('file')->storeAs('jawara/pendanaan', $filename, 'local');
                $file['pendanaan'] = $path;
            }
            if($request->hasFile('bukti')){
                $filename = time(). '_'.Str::random(3).$request->file('bukti')->getClientOriginalName();
                $path = $request->file('bukti')->storeAs('jawara/bukti', $filename, 'local');
                $file['bukti'] = $path;
            }
            if (JawaraPendaftar::daftar([
                'id' => $idPendaftar,
                'id_jawara_event' => $event->id,
                'id_mahasiswa' => json_encode($nim),
                'id_dosen' => $idDosen,
                'status' => 0,
                'file' => json_encode($file)
            ])) {
                return $this->index([1, 'Berhasil Mendaftar']);
            }
        }
        return $this->index([0, 'Gagal Mendaftar Lomba']);
    }

    public function detail(JawaraEvent $event)
    {
        if (!$event)
            abort(404);
        $terlaksana = false;
        $numPendaftar = 0;
        $numPemenang = 0;
        $now = strtotime(now());
        $daftar = strtotime($event->mulai_daftar);
        $akhir = strtotime($event->akhir_daftar);
        if ($now >= $daftar and $akhir >= $now) {
            return redirect("/jawara/$event->id");
        } else if ($now > $akhir) {
            $terlaksana = true;
            $numPendaftar = JawaraPendaftar::countPendaftar($event->id);
        } else if ($event->finish) {
            $numPendaftar = JawaraPendaftar::countPendaftar($event->id);
            $numPemenang = JawaraPendaftar::countPemenangEvent($event->id);
        }
        $riwayatFile = JawaraPendaftar::riwayatFile($event->id);
        if ($riwayatFile)
            foreach ($riwayatFile as &$fail) {
                $fail = json_decode($fail['file']);
            }
        array_push($this->nav, [
            'title' => 'Detail Event ' . $event->nama,
            'link' => url("/jawara/detail/$event->id")
        ]);
        return view('details-event', [
            'title' => 'Detail Event ' . $event->nama,
            'jawara' => 'selected',
            'nav' => $this->nav,
            'event' => $event,
            'terlaksana' => $terlaksana,
            'numPendaftar' => $numPendaftar,
            'numPemenang' => $numPemenang,
            'riwayatFile' => $riwayatFile
        ]);
    }

    public function ask(Request $request)
    {
        if(!auth()->user()) abort(500);
        $request->validate([
            'email' => 'required|email',
            'pertanyaan' => 'required|max:255'
        ]);

        $data = $request->only(['email', 'pertanyaan']);

        if(JawaraTanya::tanya($data)){
            return $this->index([1, 'Pertanyaan anda terkirim. Tunggu informasi selanjutnya melalui email anda!']);
        }
        return $this->index([0, 'Gagal mengirimkan pertanyaan']);
    }
}
