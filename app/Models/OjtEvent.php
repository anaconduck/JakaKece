<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OjtEvent extends Model
{
    use HasFactory;

    public static function getEvent($idOjtEvent){
        return self::where('id', $idOjtEvent)
            ->where('id_prodi', config("app.idProdi")[session('prodi')])
            ->first();
    }
}
