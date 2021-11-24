<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public static function countMahasiswa($nim){
        return self::whereIn('id',$nim)
            ->count();
    }

    public static function currentMahasiswa(){
        return self::find(auth()->user()->identity);
    }
}
