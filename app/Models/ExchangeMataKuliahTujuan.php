<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeMataKuliahTujuan extends Model
{
    use HasFactory;

    public static function getMataKuliahFrom($id_exchange_tujuan){
        return self::select('exchange_mata_kuliah_tujuans.paket','exchange_mata_kuliah_tujuans.semester', 'exchange_mata_kuliahs.*')
            ->join('exchange_mata_kuliahs', 'exchange_mata_kuliahs.id','=','exchange_mata_kuliah_tujuans.id_exchange_mata_kuliah')
            ->where('exchange_mata_kuliah_tujuans.id_exchange_tujuan','=',$id_exchange_tujuan)
            ->orderBy('paket','asc')
            ->get();
    }
    public static function checkPaket($idExchangeTujuan, $idExchangePaket){
        return self::where('id_exchange_tujuan',$idExchangeTujuan)
            ->where('paket', $idExchangePaket)
            ->where('open',true)
            ->first();
    }
}
