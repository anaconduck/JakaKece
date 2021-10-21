<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExchangeEvent;
use App\Models\Mahasiswa;
use App\Models\StudentExchange as SE;

class StudentExchange extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        $pendaftaran = ExchangeEvent::getPendaftaranEvent();
        $mendatang = ExchangeEvent::getEventMendatang();
        $terlaksana = ExchangeEvent::getEventTerlaksana();
        $riwayat = SE::getRiwayatPertukaran();

        return view('exchange',[
            'title' => 'Student Exchange',
            'exchange' => 'selected',
            'pendaftaran' => $pendaftaran,
            'terlaksana' => $terlaksana,
            'mendatang' => $mendatang,
            'riwayat' => $riwayat,
            'mahasiswa' => Mahasiswa::getMahasiswa()
        ]);
    }

    public function daftar(Request $request, $id = 0){
        $user = Mahasiswa::getMahasiswa();
        if($request->method() == "GET")
        {
            $event = ExchangeEvent::find($id);
            $selesai = false;
            $mulai = true;

            if (strtotime($event->mulai) - strtotime(now()) >0){
                $mulai = false;
            }
            else if(strtotime($event->akhir) - strtotime(now())  < 0){
                $selesai = true;
            }

            $event->persyaratan = explode('|',$event->persyaratan);

            return view('details-pendaftaran-exchange',[
                'title' => 'Detail Pendaftaran Student Exchange',
                'exchange' => 'selected',
                'event' => $event,
                'user' => $user,
                'id' => $id,
                'selesai' => $selesai,
                'mulai' => $mulai
            ]);
        }
        else if($request->method() == "POST")
        {
            $event = ExchangeEvent::find($request->input('id'));
            $mulai = strtotime($event->mulai);
            $akhir = strtotime($event->akhir);
            $sekarang = strtotime(now());

            $params = [
                'title' => "Status Pendaftaran",
                'exchange' => 'selected',
                'type' => 'danger'
            ];

            if($mulai < $sekarang and $sekarang < $akhir){
                $status = SE::daftar([
                        'id_mahasiswa' => $user->id,
                        'id_exchange_event' => $request->input('id')
                    ]);

                if($status == null){
                    $params['message'] =[
                        'Anda sudah terdaftar dalam program ini.',
                        'Tunggu informasi lebih lanjut melalui notifikasi pengguna.'
                    ];
                    $params['type'] = 'info';
                }else{
                    $params['message'] =[
                        'Pendaftaran program student exchange berhasil dilakukan.',
                        'Tunggu informasi lebih lanjut melalui notifikasi pengguna.'
                    ];
                    $params['type'] = 'success';
                }
            }else{
                $params['message'] =[
                    'Pendaftaran gagal dilakukan.',
                    'Silahkan hubungi admin untuk info lebih lanjut!'
                ];
            }
            return view('status',$params);
        }
    }

    public function persyaratan($id){
        $event = ExchangeEvent::find($id);
        if(!$event){
            return redirect(url()->previous());
        }

        $event->persyaratan = explode('|',$event->persyaratan);

        return view('details-persyaratan-exchange',[
            'title' => 'Persyaratan Student Exchange',
            'exchange' => 'selected',
            'event' => $event
        ]);

    }

}
