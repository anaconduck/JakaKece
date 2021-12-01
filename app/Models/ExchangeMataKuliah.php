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
}
