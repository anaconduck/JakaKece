<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InkubasiBahasa extends Model
{
    use HasFactory;
    protected $table = 'inkubasi_bahasa';
    protected $primaryKey = 'id_course';

    public static function getCourse($courseName){
        $courseName = str_replace('-',' ',$courseName);
        return self::where('nama_course',$courseName)
            ->first()->toArray();
    }

    public static function getAllCourse(){
        return self::get();
    }


}
