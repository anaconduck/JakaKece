<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Mahasiswa extends Model
{
    use HasFactory;

    public static function getMahasiswa(){
        return self::where('user_id',Auth::user()->id)
            ->first();
    }
}
