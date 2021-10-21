<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeEvent extends Model
{
    use HasFactory;

    public static function getPendaftaranEvent(){
        return self::where('mulai', '<=', now())
            ->where('akhir','>',now())
            ->get();
    }

    public static function getEventMendatang(){
        return self::where('mulai', '>', now())
            ->get();
    }

    public static function getEventTerlaksana(){
        return self::where('akhir','<',now())
            ->get();
    }
}
