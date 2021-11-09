<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\OJT;
use App\Models\OJTPendaftar;
use Illuminate\Http\Request;

class PendaftaranOJT extends Controller
{
    public function daftar(Request $request,OJT $id){
        $params = [
            'title' => 'Pendaftaran Jawara - '.$id->nama_event,
            'training' => 'selected',
            'back' => url('/training')
        ];
        $message = [
            'Status Pendaftaran OJT'
        ];

        $data = $request->all();
        unset($data['_token']);

        $idOJT = $this->idOJT($data['Nim'], $id->id);

        $pendaftaran = OJTPendaftar::find($idOJT);

        if($pendaftaran){
            $message[1] = 'Anda atau tim anda sudah mendaftar pada event jawara ini.';
            $params['type'] = 'warning';
        }
        else if(Mahasiswa::find($data['Nim'])){
            $pendaftaran = OJTPendaftar::createPendaftaran($idOJT,$id->id,$data['Nim']);
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

    private function idOJT($nimPendaftar, $idEvent){
        $str = (string)$idEvent;
        return $str.$nimPendaftar;
    }
}
