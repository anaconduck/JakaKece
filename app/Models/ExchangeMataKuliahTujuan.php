<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExchangeMataKuliahTujuan extends Model
{
    use HasFactory;

    public static function getMataKuliahFrom($id_exchange_tujuan){
        return self::select('exchange_mata_kuliah_tujuans.semester', 'exchange_mata_kuliahs.*')
            ->join('exchange_mata_kuliahs', 'exchange_mata_kuliahs.id','=','exchange_mata_kuliah_tujuans.id_exchange_mata_kuliah')
            ->where('exchange_mata_kuliah_tujuans.id_exchange_tujuan','=',$id_exchange_tujuan)
            ->orderBy('exchange_mata_kuliahs.nama_mata_kuliah','asc')
            ->get();
    }
    public static function checkPaket($idExchangeTujuan, $idExchangePaket){
        return self::where('id_exchange_tujuan',$idExchangeTujuan)
            ->where('paket', $idExchangePaket)
            ->where('open',true)
            ->first();
    }

    public static function deleteMKFrom($tujuanID, $mkID){
        DB::beginTransaction();
        DB::table('exchange_mata_kuliah_tujuans')
            ->where('id_exchange_tujuan', '=', $tujuanID)
            ->where('id_exchange_mata_kuliah','=', $mkID)
            ->delete();
        DB::commit();
    }

}
