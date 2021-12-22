<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangePendaftar extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity',
        'id_exchange_tujuan',
        'file',
        'id_exchange_mata_kuliah'
    ];

    public static function checkPendaftaran($identity, $idExchangeTujuan){
        return self::where('identity', $identity)
            ->where('id_exchange_tujuan', $idExchangeTujuan)
            ->where('status_kelulusan', 0)
            ->first();
    }

    public static function riwayat($identity, $limit = null, $paginate = false){
        $query = self::select('exchange_pendaftars.*', 'exchange_tujuans.nama_universitas')
            ->join('exchange_tujuans','exchange_tujuans.id','=','exchange_pendaftars.id_exchange_tujuan')
            ->where('exchange_pendaftars.identity', $identity);
        if($limit) $query = $query->limit($limit);
        if($paginate) return $query->paginate(9);
        return $query->get();
    }

    public static function getDokumentasi($idExchangeTujuan){
        return self::select('dokumentasi')
            ->where('id_exchange_tujuan', $idExchangeTujuan)
            ->paginate(10);
    }

    public static function jumlahPendaftar($idExchangeTujuan){
        return self::where('id_exchange_tujuan', $idExchangeTujuan)
            ->whereNotNull('dokumentasi')
            ->count();
    }

    public static function countPendaftar(){
        return self::where('created_at', );
    }

    public static function countSE(){
        return self::where('status_pendaftaran', 2)
            ->count();
    }

    public static function pointer($idTujuan){
        $q = self::where('status_pendaftaran', 2)
            ->where('status_kelulusan', true);
        if(!$idTujuan){
            return $q->orderBy('created_at', 'asc')
            ->lazy();
        }
        return $q->where('id_exchange_tujuan', $idTujuan)
        ->orderBy('created_at', 'asc')
        ->lazy();
    }

    public static function totalMahasiswaExchange(){
        return self::where('status_pendaftaran', '>', 0)
            ->count();
    }
}
