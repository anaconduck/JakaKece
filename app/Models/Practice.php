<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Practice extends Model
{
    use HasFactory;

    public static function show($idCourse, $sesi, $offset){
        return self::where('id_course',$idCourse)
            ->where('sesi',$sesi)
            ->offset($offset-1)
            ->first();
    }

    public static function pushPractice($data){
        DB::beginTransaction();
        DB::table('practices')->insert($data);
        DB::commit();
    }
}
