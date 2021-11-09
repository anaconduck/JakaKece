<?php

namespace App\Http\Controllers;

use App\Models\JawaraCenter;
use App\Models\JawaraEvent;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PendaftaranJawara extends Controller
{
    public function daftar(Request $request, JawaraEvent $id){
        $params = [
            'title' => 'Pendaftaran Jawara - '.$id->nama_event,
            'jawara' => 'selected',
            'back' => url('/jawara')
        ];
        $message = [
            'Status Pendaftaran Jawara'
        ];

        $data = $request->all();
        unset($data['_token']);

        $nimPendaftar = [];
        foreach($data as $key => $value){
            if(str_contains($key, 'Nim')){
                array_push($nimPendaftar, $value);
            }
        }
        sort($nimPendaftar);

        $idJC = $this->idJC($nimPendaftar, $id->id);

        $pendaftaran = JawaraCenter::find($idJC);

        if($pendaftaran){
            $message[1] = 'Anda atau tim anda sudah mendaftar pada event jawara ini.';
            $params['type'] = 'warning';
        }
        else if(sizeof($data)/2 == Mahasiswa::find($nimPendaftar)->count()){
            $data = json_encode($data);
            $pendaftaran = JawaraCenter::createPendaftaran($idJC,$data,$id->id);
            if($pendaftaran){
                $message[1] = 'Pendaftaran Berhasil dilakukan. Informasi selanjutnya akan di kirim ke notifikasi pengguna.';
                $params['type'] = 'success';
            }else{
                $message[1] = 'Pendaftaran gagal dilakukan. Silahkan hubungi admin untuk informasi selengkapnya.';
            }
        }else{
            $message[1] = 'Pendaftaran gagal dilakukan karena data yang anda masukkan tidak sesuai dengan database sistem.';
        }
        $params['message'] = $message;
        return view('status',$params);
    }

    private function idJC($nimPendaftar, $idEvent){
        $str = (string)$idEvent;
        foreach($nimPendaftar as $nim){
            $str .= (string)$nim;
        }
        return $str;
    }
}
