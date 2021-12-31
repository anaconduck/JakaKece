<?php

namespace App\Http\Controllers;

use App\Models\DeskripsiSistem;
use App\Models\DokumentasiSistem;
use App\Models\OjtEvent;
use App\Models\OjtMataKuliah;
use App\Models\OjtPaket;
use App\Models\OjtPendaftar;
use App\Models\OjtTujuan;
use Illuminate\Http\Request;

class Ojt extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'On The Job Training',
                'link' => url('/training')
            ],
        ];
    }

    public function index($message = [-1, null]){
        $slides = DeskripsiSistem::getDeskripsiSistem(config('app.fitur.training'));
        $deskripsi = DokumentasiSistem::getDokumentasi(config('app.fitur.training'));
        return view('ojt',[
            'title' => 'On The Job Training',
            'nav' => $this->nav,
            'training' => 'selected',
            'message' => $message,
            'jumlahTujuanTraining' => OjtTujuan::count(),
            'jumlahPendaftarTraining' => OjtPendaftar::count(),
            'jumlahEvent' => OjtEvent::count(),
            'slides' => $slides,
            'section' => Request('s'),
            'deskripsi' => $deskripsi
        ]);
    }
    public function showPaket(Request $request, OjtTujuan $tujuan){
        $this->middleware(['mahasiswa']);
        if( $tujuan == null)
            abort(404);

        array_push($this->nav,[
            'title' => $tujuan->nama_instansi,
            'link' => url("/training/$tujuan->id")
        ]);

        $paket = OjtPaket::getPaket($tujuan->id, $request->session()->get('prodi', ''));
        $mkPaket = [];
        foreach($paket as $p){
            $mkPaket[$p->id] = OjtMataKuliah::getMatkul($p->id_ojt_event);
        }
        return view('ojt-paket',[
            'title' => 'On The Job Training',
            'nav' => $this->nav,
            'tujuan' => $tujuan,
            'paket' => $paket,
            'training' => 'selected',
            'mk' => $mkPaket
        ]);
    }

    public function showPendaftaran(OjtTujuan $tujuan, OjtPaket $paket){
        $this->middleware(['mahasiswa']);
        if($tujuan == null or $paket == null)
            abort(404);

        $now = strtotime(now());
        $mulai = strtotime($paket->mulai_daftar);
        $akhir = strtotime($paket->akhir_daftar);

        if($now < $mulai or $now >$akhir)
            abort(404);

        $event = OjtEvent::getEvent($paket->id_ojt_event);

        if($event == null)
            abort(404);

        $matkul = OjtMataKuliah::getMatkul($event->id);

        array_push($this->nav, [
            'title' => $tujuan->nama_instansi,
            'link' => url("/training/$tujuan->id")
        ]);

        array_push($this->nav, [
            'title' => $event->nama_event,
            'link' => url("/training/$tujuan->id/$paket->id")
        ]);

        return view('pendaftaran-ojt',[
            'title' => "Pendaftaran Training  $tujuan->nama_instansi",
            'nav' => $this->nav,
            'event' => $event,
            'matkul' => $matkul,
            'tujuan' => $tujuan,
            'training' => 'selected',
            'paket' => $paket
        ]);
    }
    public function daftar(OjtTujuan $tujuan, OjtPaket $paket){
        $this->middleware(['mahasiswa']);
        if($tujuan == null or $paket == null)
            abort(404);

        $now = strtotime(now());
        $mulai = strtotime($paket->mulai_daftar);
        $akhir = strtotime($paket->akhir_daftar);

        if($now < $mulai or $now >$akhir)
            abort(404);

        $event = OjtEvent::getEvent($paket->id_ojt_event);

        if($event == null)
            abort(404);
        $pendaftar = OjtPendaftar::where('id_prodi',config('app.idProdi')[session('prodi')])
            ->where('id_paket', $paket->id)
            ->where('identity', auth()->user()->identity)
            ->first();
        if($pendaftar){
            return $this->index([1, 'Anda telah terdaftar dalam program magang '.$tujuan->nama_instansi]);
        }

        $pendaftar = OjtPendaftar::create([
            'id_prodi' => config('app.idProdi')[session('prodi')],
            'id_paket' => $paket->id,
            'identity' => auth()->user()->identity,
            'status_pendaftaran' => false
        ]);

        if($pendaftar)
            return $this->index([1, 'Pendaftaran Ojt berhasil dilakukan. Tunggu Informasi selanjutnya!']);
        return $this->index([0, 'Pendaftaran Ojt gagal dilakukan.']);
    }

    public function showTerlaksana(OjtPaket $paket){
        if(!$paket)
            abort(404);

        $event = OjtEvent::find($paket->id_ojt_event);
        $matkul = OjtMataKuliah::getMatkul($event->id);
        $tujuan = OjtTujuan::find($paket->id_ojt_tujuan);
        $dokumentasi = OjtPendaftar::getDokumentasi($event->id_prodi, $paket->id);

        $numTraining = OjtPendaftar::countTraining($paket->id, config('app.idProdi')[session('prodi')]);

        array_push($this->nav, [
            'title' => "Training terlaksana $event->nama_event",
            'link' => url("/training/terlaksana/$paket->id")
        ]);

        return view('details-training',[
            'title' => 'Detail Pelaksanaan '.$event->nama_event,
            'training' => 'selected',
            'nav' => $this->nav,
            'event' => $event,
            'matkul' => $matkul,
            'tujuan' => $tujuan,
            'numTraining' => $numTraining,
            'paket' => $paket,
            'dokumentasi' => $dokumentasi
        ]);
    }
    public function riwayat(OjtTujuan $tujuan){
        if($tujuan == null)
            abort(404);

        $riwayatEvent = OjtTujuan::riwayat($tujuan->id);

        array_push($this->nav, [
            'title' => 'Riwayat Training '.$tujuan->nama_instansi,
            'link' => url("/training")
        ]);

        return view('riwayat-ojt',[
            'title' => 'Riwayat Training '.$tujuan->nama_instansi,
            'nav' => $this->nav,
            'training' => 'selected',
            'tujuan' => $tujuan,
            'riwayat' => $riwayatEvent
        ]);
    }
}
