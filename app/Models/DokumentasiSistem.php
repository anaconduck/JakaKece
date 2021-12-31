<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumentasiSistem extends Model
{
    use HasFactory;

    public static function getDokumentasi($fitur = 1){
        $query = self::where('fitur', $fitur)
            ->limit(3)
            ->get()
            ->toArray();
        return $query;
    }
}
