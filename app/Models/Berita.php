<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    public static function showBertita(){
        return self::where('display', true)
            ->orderBy('created_at', 'desc')
            ->lazy();
    }

    public static function topBerita(){
        return self::where('tipe', 2)
            ->where('display', true)
            ->whereNotNull('file')
            ->orderBy('created_at', 'desc')
            ->lazy();
    }
}
