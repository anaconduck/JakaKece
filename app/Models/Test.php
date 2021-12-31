<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Test extends Model
{
    use HasFactory;

    protected $attributes = [
        'jumlah_pengerjaan' => 0,
        'jumlah_benar' => 0
    ];

    public static function show($idCourse, $sesi, $offset){
        return self::where('id_course',$idCourse)
            ->where('sesi',$sesi)
            ->offset($offset-1)
            ->first();
    }

    public static function pushTest($data){
        DB::beginTransaction();
        DB::table('tests')->insert($data);
        DB::commit();
    }

    public static function countSoal(){
        return self::count();
    }

    public static function countQuest($course, $sesi){
        return self::where('id_course', $course)
            ->where('sesi', $sesi)
            ->count();
    }
}
