<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExchangeTujuan extends Model
{
    use HasFactory;

    public static function pushTujuan($data){
        DB::beginTransaction();
        DB::table('exchange_tujuans')->insert($data);
        DB::commit();
    }
    public static function getSimpleTujuan(){
        return self::select('nama_universitas','id')
            ->orderBy('nama_universitas', 'asc')
            ->get()
            ->toArray();
    }

    public static function pointer($periode){
        return self::selectRaw('exchange_tujuans.nama_universitas, count(*) as jumlah')
            ->join('exchange_pendaftars', 'exchange_pendaftars.id_exchange_tujuan', '=', 'exchange_tujuans.id')
            ->where('exchange_pendaftars.periode', $periode)
            ->groupBy('exchange_tujuans.nama_universitas')
            ->orderBy('exchange_tujuans.nama_universitas', 'asc')
            ->get()
            ->toArray();
    }
}
