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
        'paket_exchange'
    ];

    public static function checkPendaftaran($identity, $idExchangeTujuan){
        return self::where('identity', $identity)
            ->where('id_exchange_tujuan', $idExchangeTujuan)
            ->where('status_kelulusan', 0)
            ->first();
    }

    public static function riwayat($identity){
        return self::select('exchange_pendaftars.*', 'exchange_tujuans.nama_universitas')
            ->join('exchange_tujuans','exchange_tujuans.id','=','exchange_pendaftars.id_exchange_tujuan')
            ->where('exchange_pendaftars.identity', $identity)
            ->get();
    }
}
