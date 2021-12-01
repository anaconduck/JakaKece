<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\JawaraEvent;
use App\Models\JawaraPendaftar;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

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

    public function index($message = [-1]){
        return view('jawara',[
            'title' => 'Jawara Center',
            'jawara' => 'selected',
            'nav' => $this->nav,
            'totalPendaftar' => JawaraPendaftar::count(),
            'totalJawara' => JawaraPendaftar::countPemenang(),
            'totalLomba' => JawaraEvent::count(),
            'message' => $message
        ]);
    }

    public function showDaftar(JawaraEvent $event){
        if(!$event)
            abort(404);
        $now = strtotime(now());
        $daftar = strtotime($event->mulai_daftar);
        $akhir = strtotime($event->akhir_daftar);
        if($now < $daftar or $akhir < $now ){
            abort(404);
        }

        array_push($this->nav,[
            'title' => 'pendaftaran '.$event->nama,
            'link' => url("/jawara/$event->id")
        ]);
        return view('pendaftaran-jawara',[
            'title' => 'Pendaftaran Jawara Event '.$event->nama,
            'jawara' => 'selected',
            'nav' => $this->nav,
            'event' => $event,
            'ind' => 0,
            'dosen' => Dosen::getDosenPembimbing()
        ]);
    }

    public function daftar(Request $request, JawaraEvent $event){
        $data = $request->all();
        unset($data['_token']);
        $idDosen = $data['dosen'];
        unset($data['dosen']);
        if($idDosen == 0)
            $idDosen = null;
        $nim = [];
        $num = 0;

        foreach($data as $k => $d){
            if(strpos($k,'nim') !==false and $d != null){
                array_push($nim, $d);
                $num ++;
            }
        }
        sort($nim);
        $idPendaftar = $event->id . implode('',$nim);
        $mhs = Mahasiswa::countMahasiswa($nim);
        if($mhs == $num){
            if(JawaraPendaftar::daftar([
                'id' => $idPendaftar,
                'id_jawara_event' => $event->id,
                'id_mahasiswa' => json_encode($nim),
                'id_dosen' => $idDosen,
                'status' => 0
            ])){
                return $this->index([1,'Berhasil Mendaftarkan']);
            }
        }
        return $this->index([0,'Gagal Mendaftar Lomba']);
    }

    public function detail(JawaraEvent $event){
        if(!$event)
            abort(404);
        $terlaksana = false;
        $numPendaftar = 0;
        $numPemenang = 0;
        $now = strtotime(now());
        $daftar = strtotime($event->mulai_daftar);
        $akhir = strtotime($event->akhir_daftar);
        if($now >= $daftar and $akhir >= $now ){
            return redirect("/jawara/$event->id");
        }
        else if($now > $akhir){
            $terlaksana = true;
            $numPendaftar = JawaraPendaftar::countPendaftar($event->id);
        }
        else if($event->finish){
            $numPendaftar = JawaraPendaftar::countPendaftar($event->id);
            $numPemenang = JawaraPendaftar::countPemenangEvent($event->id);
        }

        array_push($this->nav,[
            'title' => 'Detail Event '.$event->nama,
            'link' => url("/jawara/detail/$event->id")
        ]);
        return view('details-event',[
            'title' => 'Detail Event '.$event->nama,
            'jawara' => 'selected',
            'nav' =>$this->nav,
            'event' => $event,
            'terlaksana' => $terlaksana,
            'numPendaftar' => $numPendaftar,
            'numPemenang' => $numPemenang
        ]);
    }
}
