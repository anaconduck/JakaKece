<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    public static function getMateri($type, $materi,$target){
        $data = self::join('inkubasi_bahasa','materis.id_course','=','inkubasi_bahasa.id_course')
            ->where('nama_course',$type)
            ->where('materi',$materi)
            ->offset($target-1)
            ->first();
        return $data;
    }

    public static function getTitle($type, $materi){
        $data = self::select('id','title')
            ->join('inkubasi_bahasa','materis.id_course','=','inkubasi_bahasa.id_course')
            ->where('nama_course',$type)
            ->where('materi',$materi)
            ->get()->toArray();
        return $data;
    }

    public static function getAllMateri($idCourse){
        return self::select('materi')
            ->groupBy('materi')
            ->where('id_course',$idCourse)
            ->get()->toArray();
    }

    public static function showMateri($offset = 0, $item = 10){
        return self::select('materis.id','materis.title','materis.materi','materis.file','inkubasi_bahasa.nama_course')
            ->join('inkubasi_bahasa','materis.id_course','=','inkubasi_bahasa.id_course')
            ->offset($offset)
            ->limit($item)
            ->get();
    }
}
