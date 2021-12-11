<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExchangeMataKuliah extends Model
{
    use HasFactory;

    public static function pushMK($data){
        DB::beginTransaction();
        DB::table('exchange_mata_kuliahs')->insert($data);
        DB::commit();
    }

    public static function getMK($idExchangeTujuan){
        return self::select('exchange_mata_kuliahs.*')
            ->join('exchange_mata_kuliah_tujuans', 'exchange_mata_kuliah_tujuans.id_exchange_mata_kuliah', '=', 'exchange_mata_kuliahs.id')
            ->where('exchange_mata_kuliah_tujuans.id_exchange_tujuan', $idExchangeTujuan)
            ->lazy();
    }

    public static function filterMk($idExchangeTujuan, $idMK){
        return self::select('exchange_mata_kuliahs.*')
            ->join('exchange_mata_kuliah_tujuans', 'exchange_mata_kuliah_tujuans.id_exchange_mata_kuliah', '=', 'exchange_mata_kuliahs.id')
            ->where('exchange_mata_kuliah_tujuans.id_exchange_tujuan', $idExchangeTujuan)
            ->whereIn('exchange_mata_kuliah_tujuans.id_exchange_mata_kuliah', $idMK)
            ->lazy();
    }
}
