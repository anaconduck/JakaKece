<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawaraCenter extends Model
{
    protected $fillable = [
        'id',
        'id_event_jawara',
        'data_mahasiswa',
        'id_dosen_pembimbing'
    ];

    use HasFactory;
    public static function createPendaftaran($id, $dataMahasiswa, $id_event_jawara, $id_dosen_pembimbing = 0){
        $pendaftaran = new JawaraCenter([
            'id' => $id,
            'id_event_jawara' => $id_event_jawara,
            'data_mahasiswa' => $dataMahasiswa,
            'id_dosen_pembimbing' => $id_dosen_pembimbing
        ]);
        if($pendaftaran->save()){
            return $pendaftaran;
        }
        return false;
    }

    public static function show($offset, $limit){
        return self::select('event.nama_event', 'event.tanggal_event', 'jawara_centers.*')
            ->join('event', 'event.id', '=','jawara_centers.id_event_jawara')
            ->orderBy('created_at','desc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    }
}
