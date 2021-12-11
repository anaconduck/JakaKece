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
        $data->created_at = now();
        DB::beginTransaction();
        $res = DB::table('jawara_pendaftars')
            ->insert($data);
        DB::commit();
        return $res;
    }

    public static function countPendaftar($idEvent){
        return self::where('id_jawara_event',$idEvent)
            ->count();
    }

    public static function riwayat($identity, $limit = null, $paginate= false){
        $query = self::select('jawara_pendaftars.id', 'jawara_events.nama', 'jawara_pendaftars.status')
            ->join('jawara_events','jawara_pendaftars.id_jawara_event','=','jawara_events.id')
            ->where('id_mahasiswa', 'like', "%$identity%")
            ->orderBy('id_jawara_event', 'desc');
        if($limit)
            $query = $query->limit($limit);
        if($paginate) return $query->paginate(9);
        return $query->get();
    }

    public static function riwayatFile($eventID){
        return self::select('file')
            ->where('id_jawara_event', $eventID)
            ->get()->toArray();
    }
}
