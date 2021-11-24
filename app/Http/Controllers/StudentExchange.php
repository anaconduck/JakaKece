<?php

namespace App\Http\Controllers;

use App\Models\ExchangeMataKuliahTujuan;
use App\Models\ExchangePendaftar;
use App\Models\ExchangePersyaratan;
use App\Models\ExchangeTujuan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class StudentExchange extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Student Exchange',
                'link' => url('/exchange')
            ]
            ];
    }
    public function index($message = [-2,null]){
        return view('exchange',[
            'title' => "Student Exchange",
            'exchange' => 'selected',
            'nav' => $this->nav,
            'message' => $message,
            'totalMahasiswaExchange' =>0,
            'totalExchangeEvent' => 0,
            'totalPendaftar' => 0
        ]);
    }

    public function showPaket($lokasi, ExchangeTujuan $tujuan){
        if(($lokasi != 'dn' and $lokasi != 'ln') or !$tujuan)
            abort(404);

        array_push($this->nav,[
            'title' => 'paket student exchange'.$tujuan->nama_universitas,
            'link' => url("/exchange/$lokasi/$tujuan->id")
        ]);

        $persyaratan = ExchangePersyaratan::lazy();
        $paketMataKuliah = ExchangeMataKuliahTujuan::getMataKuliahFrom($tujuan->id);
        $paket = [];
        foreach($paketMataKuliah as $p){
            if(!array_key_exists($p->paket, $paket))
                $paket[$p->paket] = [];
            array_push($paket[$p->paket],$p);
        }

        return view('exchange-paket',[
            'title' => 'Paket Student Exchange '. $tujuan->nama_universitas,
            'exchange' => 'selected',
            'nav' => $this->nav,
            'tujuan' => $tujuan,
            'paket' => $paket,
            'persyaratan' => $persyaratan,
            'lokasi' => $lokasi
        ]);
    }

    public function showDaftar($lokasi, ExchangeTujuan $tujuan, $paket){
        if(($lokasi != 'dn' and $lokasi != 'ln') or !$tujuan)
            abort(404);

        if(!ExchangeMataKuliahTujuan::checkPaket($tujuan->id,$paket)){
            abort(404);
        }

        if(ExchangePendaftar::checkPendaftaran(auth()->user()->identity,$tujuan->id)){
            return $this->index([1, 'Anda telah terdaftar. Tunggu info selanjutnya!']);
        }
        
        $mahasiswa = Mahasiswa::find(auth()->user()->identity);

        if(!$mahasiswa)
            return redirect('/home');

        array_push($this->nav,[
            'title' => 'pendaftaran student exchange'.$tujuan->nama_universitas,
            'link' => url("/exchange/$lokasi/$tujuan->id")
        ]);

        return view('pendaftaran-exchange',[
            'title' => 'Pendaftaran Student Exchange '.$tujuan->nama_universitas,
            'exchange' => 'selected',
            'nav' => $this->nav,
            'tujuan' => $tujuan,
            'mahasiswa' => $mahasiswa,
            'paket' => $paket
        ]);
    }

    public function daftar(Request $request, $lokasi, ExchangeTujuan $tujuan, $paket){
        if(($lokasi != 'dn' and $lokasi != 'ln') or !$tujuan)
            abort(404);

        if(!ExchangeMataKuliahTujuan::checkPaket($tujuan->id,$paket)){
            abort(404);
        }

        if(ExchangePendaftar::checkPendaftaran(auth()->user()->identity,$tujuan->id)){
            return $this->index([1, 'Anda telah terdaftar. Tunggu info selanjutnya!']);
        }

        $mahasiswa = Mahasiswa::find(auth()->user()->identity);

        if(!$mahasiswa)
            return redirect('/home');

        $input = $request->file();
        $validator = Validator::make($input,[
            '*' => 'bail|required|max:10240|mimetypes:jpeg,jpg,png,gif,application/msword,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf'
        ]);
        if($validator->fails()){
            return redirect('/exchange')
                ->withErrors($validator);
        }

        $fileU = [];

        if($request->file()){
            foreach($request->file() as $key => $file){
                $filename = time().'_'. Str::random(10).$file->getClientOriginalName();
                $filePath = $file->storeAs('berkas_student_exchange',$filename,'local');
                $fileU[$key] = $filePath;
            }
            $pendaftar = new ExchangePendaftar([
                'identity' => $mahasiswa->id,
                'id_exchange_tujuan' => $tujuan->id,
                'file' => json_encode($fileU),
                'paket_exchange' => $paket
            ]);
            if($pendaftar->save())
                return $this->index([1, 'Pendaftaran Anda berhasil!']);
        }
        return $this->index([0, 'Pendaftaran Anda gagal!']);
    }

}
