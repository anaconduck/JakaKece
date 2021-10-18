<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryExam extends Model
{
    use HasFactory;

    public static function getLastHistoryExam($type){
        $history = self::where('mahasiswa_id',Mahasiswa::getMahasiswa()->id)
            ->where('type',$type)
            ->orderBy('id','desc')
            ->first();

        if($history == null)
            return self::make($type);

        return $history;
    }

    public static function make($type){
        $history = new HistoryExam();
        $history->mahasiswa_id = Mahasiswa::getMahasiswa()->id;
        $history->type = $type;

        $history->save();

        if($history->isClean())
            return $history;

        return null;
    }

    public static function getHistoryExam($mhsid, $id){
        return self::where('mahasiswa_id',$mhsid)
            ->where('id',$id)
            ->first();
    }
}
