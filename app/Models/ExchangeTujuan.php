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
}
