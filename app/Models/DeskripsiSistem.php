<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskripsiSistem extends Model
{
    use HasFactory;

    public static function lazyDeskripsiSistem($fitur){
        return self::where('fitur', $fitur)
            ->lazy();
    }

    public static function getDeskripsiSistem($fitur){
        return self::where('fitur', $fitur)
            ->get();
    }
}
