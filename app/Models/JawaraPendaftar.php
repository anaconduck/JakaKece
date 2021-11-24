<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JawaraPendaftar extends Model
{
    use HasFactory;

    public static function countPemenang(){
        return self::whereBetween('status', [1,5])
            ->count();
    }
    public static function countPemenangEvent($idEvent){
        return self::where('id_jawara_event',$idEvent)
            ->whereBetween('status', [1,5])
            ->count();
    }

    public static function daftar($data){
        return DB::table('jawara_pendaftars')
            ->insert($data);
    }

    public static function countPendaftar($idEvent){
        return self::where('id_jawara_event',$idEvent)
            ->count();
    }

    public static function riwayat($identity){
        return self::select('jawara_events.id', 'jawara_events.nama')
            ->join('jawara_events','jawara_pendaftars.id_jawara_event','=','jawara_events.id')
            ->where('id_mahasiswa', 'like', "%$identity%")
            ->get();
    }
}
