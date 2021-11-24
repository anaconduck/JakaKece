<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawaraEvent extends Model
{
    use HasFactory;

    public static function getPendaftaranEvent($offset = 0,$limit = 10){
        return self::where('mulai_daftar','<',now())
            ->where('akhir_daftar','>',now())
            ->orderBy('akhir_daftar','desc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    }

    public static function getEventMendatang(){
        return self::where('mulai_daftar','>',now())
            ->get();
    }

    public static function getEventTerlaksana(){
        return self::where('mulai','<', now())
            ->get();
    }
}
