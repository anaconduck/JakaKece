<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Materi extends Model
{
    use HasFactory;

    public static function getSesi($idCourse){
        return self::select('distinct sesi')
            ->where('id_course', $idCourse)
            ->get()
            ->toArray();
    }

    public static function getMateri($idCourse, $sesi, $ind){
        return self::where('id_course', $idCourse)
            ->where('sesi', $sesi)
            ->offset($ind-1)
            ->first();
    }

    public static function allJudulWith($idCourse, $sesi){
        return self::select('judul')
            ->where('id_course',$idCourse)
            ->where('sesi', $sesi)
            ->get()->toArray();
    }

    public static function pushMateri($data){
        DB::beginTransaction();
        DB::table('materis')->insert($data);
        DB::commit();
    }

    public static function firstMateri($idCourse, $sesi){
        return self::where('id_course', $idCourse)
            ->where('sesi', $sesi)
            ->first();
    }

    public static function countMateri(){
        return self::count();
    }
}
