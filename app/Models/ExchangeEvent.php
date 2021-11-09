<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeEvent extends Model
{
    use HasFactory;

    public static function getPendaftaranEventDalamNegeri(){
        return self::where('mulai', '<=', now())
            ->where('akhir','>',now())
            ->where('dalam_negeri',true)
            ->get();
    }

    public static function getPendaftaranEventLuarNegeri(){
        return self::where('mulai', '<=', now())
            ->where('akhir','>',now())
            ->where('dalam_negeri',false)
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

    public static function getPelaksanaanEvent($id){
        $data = self::where('akhir','<',now())
            ->where('id',$id)
            ->get()[0];
        $data->persyaratan = explode('|',$data->persyaratan);
        $data->kelengkapan = explode('|', $data->kelengkapan);
        return $data;
    }

    public static function show($offset, $limit){
        return self::orderBy('akhir','desc')
            ->offset($offset)
            ->limit($limit)
            ->get();
    }
}
