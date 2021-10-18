<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    public static function getMateri($type, $materi,$target){
        $data = self::where('type',$type)
            ->where('materi',$materi)
            ->offset($target-1)
            ->first();
        return $data;
    }

    public static function getTitle($type, $materi){
        $data = self::select('id','title')
            ->where('type',$type)
            ->where('materi',$materi)
            ->get()->toArray();
        return $data;
    }

}
